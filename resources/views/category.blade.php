@extends('layouts.blog-category')
@section('content')
    <!-- Bottom Header Area -->
    <div class="bottom-header">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="main-menu">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#gazetteMenu" aria-controls="gazetteMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>
                            <div class="collapse navbar-collapse" id="gazetteMenu">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#">Today <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="index.html">Home</a>
                                            <a class="dropdown-item" href="catagory.html">Catagory</a>
                                            <a class="dropdown-item" href="single-post.html">Single Post</a>
                                            <a class="dropdown-item" href="about-us.html">About Us</a>
                                            <a class="dropdown-item" href="contact.html">Contact</a>
                                        </div>
                                    </li>
                                    @foreach($categories as $category)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('category/' . $category->name)}}">{{$category->name}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <!-- Search Form -->
                                <div class="header-search-form mr-auto">
                                    <form action="#">
                                        <input type="search" placeholder="Input your keyword then press enter..." id="search" name="search">
                                        <input class="d-none" type="submit" value="submit">
                                    </form>
                                </div>
                                <!-- Search btn -->
                                <div id="searchbtn">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area Start -->
    <div class="breadcumb-area section_padding_50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-content d-flex align-items-center justify-content-between">
                        <!-- Post Tag -->
                        {{--@foreach($categories as $category)
                        <div class="gazette-post-tag">
                            <a href="#">{{$categories->name}}</a>
                        </div>

                        <p class="editorial-post-date text-dark mb-0">--}}{{--{{$post->created_at->diffForHumans()}} by {{$post->user->name}}--}}{{--</p>
                        @endforeach--}}
                        <div class="gazette-post-tag">
                            <a href="#">{{$category->name}}</a>
                            <p class="editorial-post-date text-dark mb-0">
                                {{--{{$category->posts->created_at->diffForHumans()}}--}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area End -->
    <section class="catagory-welcome-post-area section_padding_100">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-12 col-md-4">
                            {{--@if($category->name == $post->categories)--}}
                        <!-- Gazette Welcome Post -->
                        <div class="gazette-welcome-post">
                            <!-- Post Tag -->
                            <div class="gazette-post-tag">
                                @foreach($post->categories as $category)
                                    <a href="#">{{$category->name}}</a>
                                @endforeach
                            </div>
                            <h2 class="font-pt">{{$post->title}}</h2>
                            <p class="gazette-post-date">{{$post->created_at->diffForHumans()}}
                                by {{$post->user->name}}</p>
                            <!-- Post Thumbnail -->
                            <div class="blog-post-thumbnail my-5">
                                <img
                                    src="{{$post->photo ? asset($post->photo->file) : 'http:/via.placeholder.com/8008x600'}}"
                                    alt="post-thumb">
                            </div>
                            <!-- Post Excerpt -->
                            <p>{{$post->body}}</p>
                            <!-- Reading More -->
                            <div class="post-continue-reading-share mt-30">
                                <div class="post-continue-btn">
                                    <a href="{{url('post/' . $post->slug)}}" class="font-pt">Continue Reading <i class="fa fa-chevron-right"
                                                                                    aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                                {{--@endif--}}
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="gazette-pagination-area">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next"><i
                                            class="fa fa-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
