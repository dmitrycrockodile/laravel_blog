<?php

namespace App\Http\Controllers\Post\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;

class StoreController extends Controller
{

    public function __invoke(Post $post)
    {
        auth()->user()->likedPosts()->toggle($post->id);

        return redirect()->back();   
    }
}