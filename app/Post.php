<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class Post extends Model
{


    const IS_DRAFT = 0;
    const IS_PUBLIC = 0;


    protected $fillable = ['title', 'content', 'date', 'description'];


    public function category() // $post->category->title;
    {
        return $this->belongsTo(Category::class);
    }

    public function author() // $post->author->username;
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    { // $post->tags;
        return $this->belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
        );

    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->save();


        return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function removeImage()
    {
        if ($this->image != null) {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function uploadImage($image)
    {
        if ($image == null) {
            return;
        }

        $this->removeImage();

        $filename = str_random(10) . '.' . $image->extension();

        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function setCategory($id)
    {
        if ($id == null) {
            return;
        }

        $this->category_id = $id;
        $this->save();
    }


    public function setTags($ids)
    {
        if ($ids == null) {
            return;
        }

        $this->tags()->sync($ids);
    }


    public function setDraft()
    {
        $this->status = Post::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = Post::IS_PUBLIC;
        $this->save();
    }

    public function toggleStatus($value)
    {
        if ($value == null) {

            return $this->setDraft();

        }

        return $this->setPublic();

    }


    public function setFeatured()
    {
        $this->is_featured = 0;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_featured = 1;
        $this->save();
    }

    public function toggleFeatured($value)
    {
        if ($value == null) {

            return $this->setStandart();

        }

        return $this->setFeatured();
    }

    public function getImage()
    {
        if ($this->image == null) {
            return '/img/no-image.png';
        }

        return '/uploads/' . $this->image;

    }

    public function setDateAttribute($value)
    {

        $date = Carbon::createFromFormat('d/m/y', $value)
            ->format('Y-m-d');


        $this->attributes['date'] = $date;
    }

    public function getCategoryTitle()
    {
        if ($this->category != null) {
            return $this->category->title;
        }

        return 'Немає категорій';
    }

    public function getTagsTitles()
    {

        if (!$this->tags->isEmpty()) {
            return implode(', ', $this->tags->pluck('title')->all());
        }

        return 'Немає тегів';
    }


    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');

        return $date;
    }

    public function getCategoryId()
    {
        return $this->category != null ? $this->category->id : null;
    }

    public function getDate()
    {
        return Carbon::createFromFormat('d/m/y', $this->date)->format('F d, Y');
    }


    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getPrevious()
    {
        $postId = $this->hasPrevious();
        return self::find($postId);
    }

    public function getNext()
    {
        $postId = $this->hasNext();
        return self::find($postId);
    }

    public function related()
    {
        return self::all()->except($this->id);
    }

    public function hasCategory()
    {
        return $this->category != null ? true : false;
    }

    public function getComments()
    {
        return $this->comments()->where('status',1)->get();
    }





}


