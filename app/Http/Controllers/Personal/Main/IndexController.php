<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function __invoke()
    {
        $likedPostsCount = auth()->user()->likedPosts->count();
        $commentedPostsCount = auth()->user()->comments->count();

        return view('personal.main.index', compact('likedPostsCount', 'commentedPostsCount'));   
    }
}