@extends('layouts.main')

@section('content')
<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{ $date->format('F d, Y • h:i a') }} • Featured • {{ $post->comments->count() }} Comments</p>
        <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
            <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto text-center mb-5" data-aos="fade-up">
                    {!! $post->content !!}
                </div>
            </div>

            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <p data-aos="fade-up"><a href="#">Lorem ipsum, or lipsum as it is sometimes known,</a> is dummy text used in laying out printed graphic or web designs. The passage is at attributed to an unknown typesetters in 1the 5th century who is thought scrambled with all parts of Cicero’s De. Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out printed graphic or web designs</p>
                    <h2 class="mb-4" data-aos="fade-up">{{ $post->title }}</h2>
                    <ul data-aos="fade-up">
                        <li>What manner of thing was upon me I did not know, but that it was large and heavy and many-legged I could feel.</li>
                        <li>My hands were at its throat before the fangs had a chance to bury themselves in my neck, and slowly</li>
                        <li>I forced the hairy face from me and closed my fingers, vise-like, upon its windpipe.</li>
                    </ul>

                    <blockquote data-aos="fade-up">
                        <p>You are safe here! I shouted above the sudden noise. She looked away from me downhill. The people were coming out of their houses, astonished.</p>
                        <footer class="blockquote-footer">Oluchi Mazi</footer>
                    </blockquote>
                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out printed graphic or web designs. The passage is at attributed to an unknown typesetters in 1the 5th century who is thought scrambled with all parts of Cicero’s De. Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out printed graphic or web designs</p>
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-lg-9 mx-auto">
                <section class="related-posts">
                    <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                    <div class="row">
                        @foreach ($relatedPosts as $relatedPost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <a href="{{ route('post.show', $relatedPost->id) }}">
                                    <img src="{{ asset('storage/' . $relatedPost->preview_image) }}" alt="{{ $relatedPost->title }}" class="post-thumbnail">
                                    <p class="post-category">{{ $relatedPost->title }}</p>
                                    <h5 class="post-title">{!! $relatedPost->content !!}</h5>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>
                <section class="comment-section">
                    <div class="comments">
                        <div class="comments-header d-flex justify-content-between  mb-5" data-aos="fade-up">
                            <h2 class="section-title">Comments ({{ $post->comments->count() }})</h2>
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
                        <ul class="card-comments" data-aos="fade-up">
                            @foreach ($post->comments as $comment)
                                <li class="card-comment">
                                    <div class="comment-text">
                                        <span class="username">
                                            {{ $comment->user->name }}
                                            <span class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                                        </span>
                                        {{ $comment->message }}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @auth
                        <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="message" id="comment" class="form-control" placeholder="Add comment here" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    @endauth
                </section>
            </div>
        </div>
    </div>
</main>
@endsection