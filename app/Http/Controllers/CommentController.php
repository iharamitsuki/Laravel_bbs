<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;

class CommentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $comment = Post::find($id);

        return view('comment.create', compact('comment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * $request　フォームから受けっとった値
     * $idで紐づいたpostのデータを取得する
     */
    public function store(Request $request, string $id)
    {
        // ポストのデータを取ってくる
        $post = Post::find($id);

        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $post->id,
            'comment' => $request->comment,
        ]);

        return to_route('post.index')
        ->with('message', $post->title . 'に返信しました！');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Comment::find($id);

        return view('comment.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Comment::find($id);

        $update->comment = $request->comment;

        $update->save();

        return to_route('comment.edit', ['id' => $request->id])
        ->with('message', 'コメントを更新しました！');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $delete = Comment::find($id);
        $delete->delete();

        return to_route('post.index')
        ->with('message', 'コメントを削除しました！');
    }
}
