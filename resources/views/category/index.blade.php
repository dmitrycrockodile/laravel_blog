@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{ $category->title }}</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ asset('storage/' . $post->preview_image) }}" alt="{{ $post->title }}">
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
            </div>
        </section>
    </div>
</main>
@endsection