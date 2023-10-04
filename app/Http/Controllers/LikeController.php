<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;

class LikeController extends Controller
{
    public function store(Request $request, string $id)
    {
        $post = Post::find($id);

        Auth::User()->like($id);

        return to_route('post.index')
        ->with('message', $post->title . 'にいいねしました！');
    }

    public function delete(string $id)
    {
        $post = Post::find($id);

        Auth::User()->unlike($id);

        return to_route('post.index')
        ->with('message', $post->title . 'のいいねを取り消しました！');
    }
}
