@extends('layout')

@section('content')

    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="leave-comment mr0"><!--leave comment-->
                        @if(session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif

                        <h3 class="text-uppercase">My profile</h3>
                        @include('admin.errors')
                        <br>
                        <img src="{{$user->getAvatar()}}" alt="" class="profile-image">
                        <form class="form-horizontal contact-form" role="form" enctype="multipart/form-data" method="post" action="/profile">
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Name" value="{{$user->name}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="Email" value="{{$user->email}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="password" name="password"
                                           placeholder="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn send-btn">Update</button>

                        </form>
                    </div><!--end leave comment-->
                </div>
                <div class="col-md-4" data-sticky_column>
                    <div class="primary-sidebar">
                        <aside class="widget">
                            <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>

                            <div class="popular-post">


                                <a href="#" class="popular-img"><img src="assets/images/p1.jpg" alt="">

                                    <div class="p-overlay"></div>
                                </a>

                                <div class="p-content">
                                    <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                    <span class="p-date">February 15, 2016</span>

                                </div>
                            </div>
                            <div class="popular-post">

                                <a href="#" class="popular-img"><img src="assets/images/p1.jpg" alt="">

                                    <div class="p-overlay"></div>
                                </a>

                                <div class="p-content">
                                    <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                    <span class="p-date">February 15, 2016</span>
                                </div>
                            </div>
                            <div class="popular-post">


                                <a href="#" class="popular-img"><img src="assets/images/p1.jpg" alt="">

                                    <div class="p-overlay"></div>
                                </a>

                                <div class="p-content">
                                    <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                    <span class="p-date">February 15, 2016</span>
                                </div>
                            </div>
                        </aside>
                        <aside class="widget">
                            <h3 class="widget-title text-uppercase text-center">Featured Posts</h3>

                            <div id="widget-feature" class="owl-carousel">
                                <div class="item">
                                    <div class="feature-content">
                                        <img src="assets/images/p1.jpg" alt="">

                                        <a href="#" class="overlay-text text-center">
                                            <h5 class="text-uppercase">Home is peaceful</h5>

                                            <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="feature-content">
                                        <img src="assets/images/p2.jpg" alt="">

                                        <a href="#" class="overlay-text text-center">
                                            <h5 class="text-uppercase">Home is peaceful</h5>

                                            <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>
                                        </a>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="feature-content">
                                        <img src="assets/images/p3.jpg" alt="">

                                        <a href="#" class="overlay-text text-center">
                                            <h5 class="text-uppercase">Home is peaceful</h5>

                                            <p>Lorem ipsum dolor sit ametsetetur sadipscing elitr, sed </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <aside class="widget pos-padding">
                            <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>

                            <div class="thumb-latest-posts">


                                <div class="media">
                                    <div class="media-left">
                                        <a href="#" class="popular-img"><img src="assets/images/r-p.jpg" alt="">

                                            <div class="p-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                        <span class="p-date">February 15, 2016</span>
                                    </div>
                                </div>
                            </div>
                            <div class="thumb-latest-posts">


                                <div class="media">
                                    <div class="media-left">
                                        <a href="#" class="popular-img"><img src="assets/images/r-p.jpg" alt="">

                                            <div class="p-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                        <span class="p-date">February 15, 2016</span>
                                    </div>
                                </div>
                            </div>
                            <div class="thumb-latest-posts">


                                <div class="media">
                                    <div class="media-left">
                                        <a href="#" class="popular-img"><img src="assets/images/r-p.jpg" alt="">

                                            <div class="p-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                        <span class="p-date">February 15, 2016</span>
                                    </div>
                                </div>
                            </div>
                            <div class="thumb-latest-posts">

                                <div class="media">
                                    <div class="media-left">
                                        <a href="#" class="popular-img"><img src="assets/images/r-p.jpg" alt="">

                                            <div class="p-overlay"></div>
                                        </a>
                                    </div>
                                    <div class="p-content">
                                        <a href="#" class="text-uppercase">Home is peaceful Place</a>
                                        <span class="p-date">February 15, 2016</span>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <aside class="widget border pos-padding">
                            <h3 class="widget-title text-uppercase text-center">Categories</h3>
                            <ul>
                                <li>
                                    <a href="#">Food & Drinks</a>
                                    <span class="post-count pull-right"> (2)</span>
                                </li>
                                <li>
                                    <a href="#">Travel</a>
                                    <span class="post-count pull-right"> (2)</span>
                                </li>
                                <li>
                                    <a href="#">Business</a>
                                    <span class="post-count pull-right"> (2)</span>
                                </li>
                                <li>
                                    <a href="#">Story</a>
                                    <span class="post-count pull-right"> (2)</span>
                                </li>
                                <li>
                                    <a href="#">DIY & Tips</a>
                                    <span class="post-count pull-right"> (2)</span>
                                </li>
                                <li>
                                    <a href="#">Lifestyle</a>
                                    <span class="post-count pull-right"> (2)</span>
                                </li>
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end main content-->

@endsection