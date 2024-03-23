@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ 'storage/' . $post->preview_image }}" alt="{{ $post->title }}">
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="blog-post-category">{{ $post->category->title }}</p>
                            <div class="d-flex align-items-center">
                                <p class="mb-0 mr-2">{{ $post->liked_users_count }}</p>
                                @auth()
                                    <form action="{{ route('post.liked.store', $post->id) }}" method="POST">
                                        @csrf
                                        <button class="like-button" type="submit">
                                            <i class="fa{{ auth()->user()->likedPosts->contains($post->id) ? 's' : 'r' }} fa-heart"></i>
                                        </button>
                                    </form>
                                @endauth
                                @guest()
                                    <i class="far fa-heart"></i>
                                @endguest
                            </div>
                        </div>
                        <a href="{{ route('post.show', $post->id) }}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                        </a>
                    </div>
                @endforeach
                <div class="mx-auto" data-aos="fade-up" style="margin-top: -80px; margin-bottom: 80px;">
                    {{ $posts->links() }}
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-8">
                <section>
                    <div class="row blog-post-row">
                        @foreach ($randomPosts as $randomPost)
                            <div class="col-md-6 blog-post" data-aos="fade-up">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{ 'storage/' . $randomPost->preview_image }}" alt="{{ $randomPost->title }}">
                                </div>
                                <div class="d-flex justify-content-between">
                                    <p class="blog-post-category">{{ $randomPost->category->title }}</p>
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 mr-2">{{ $post->liked_users_count }}</p>
                                        @auth()
                                            <form action="{{ route('post.liked.store', $post->id) }}" method="POST">
                                                @csrf
                                                <button class="like-button" type="submit">
                                                    <i class="fa{{ auth()->user()->likedPosts->contains($randomPost->id) ? 's' : 'r' }} fa-heart"></i>
                                                </button>
                                            </form>
                                        @endauth
                                        @guest()
                                            <i class="far fa-heart"></i>
                                        @endguest
                                    </div>
                                </div>
                                <a href="{{ route('post.show', $randomPost->id) }}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{ $randomPost->title }}</h6>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
            <div class="col-md-4 sidebar" data-aos="fade-left">
                <div class="widget widget-post-carousel">
                    <h5 class="widget-title">The most discussed</h5>
                    <div class="post-carousel">
                        <div id="carouselId" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach ($discussedPosts as $index => $discussedPost)
                                    <li data-target="#carouselId" data-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                @foreach ($discussedPosts as $discussedPost)
                                    <figure class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ 'storage/' . $discussedPost->preview_image }}" alt="{{ $discussedPost->title }}">
                                        <figcaption class="post-title">
                                            <a href="{{ route('post.show', $discussedPost->id) }}">{{ $discussedPost->title }}</a>
                                        </figcaption>
                                    </figure>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget widget-post-list">
                    <h5 class="widget-title">The most popular</h5>
                    <ul class="post-list">
                        @foreach ($likedPosts as $likedPost)
                            <li class="post">
                                <a href="{{ route('post.show', $likedPost->id) }}" class="post-permalink media">
                                    <img src="{{ 'storage/' . $likedPost->preview_image }}" alt="{{ $likedPost->title }}">
                                    <div class="media-body">
                                        <h6 class="post-title">{{ $likedPost->title }}</h6>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="categories">
                    <div class="categories-top">
                        <h5 class="categories-title">Categories</h5>
                        <img src="{{ asset('assets/images/blog_widget_categories.jpg') }}" alt="categories" class="w-100 categories-image">
                    </div>
                    <ul class="categories-list">
                        @foreach ($categories as $category)
                            <li class="categories-item"><a href="{{ route('category.index', $category->id) }}">{{ $category->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</main>
@endsection