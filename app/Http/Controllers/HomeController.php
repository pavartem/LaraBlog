<?php

namespace App\Http\Controllers;

use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2);

       return view('pages.index', ['posts' => $posts]);
    }


    public function show($id)
    {
        $post = Post::where('id', $id)->firstOrFail();

        return view('pages.show', ['post'=> $post]);

    }


    public function tag($id)
    {
        $tag = Tag::where('id',$id)->firstOrFail();

        $posts = $tag->posts()->paginate(2);

        return view('pages.list', ['posts'=>$posts]);

    }

    public function category($id)
    {
        $category = Category::where('id',$id)->firstOrFail();

        $posts = $category->posts()->paginate(2);

        return view('pages.list', ['posts'=>$posts]);

    }
}
