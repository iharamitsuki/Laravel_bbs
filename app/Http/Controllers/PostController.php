<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::select('id', 'user_id', 'title', 'comment')->get();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Post::create([
            'user_id' => Auth::id(),
            'title'   => $request->title,
            'comment' => $request->comment,
        ]);

        return to_route('post.index')
        ->with('message', $request->title . 'を投稿しました！');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail = Post::find($id);

        return view('post.show', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Post::find($id);

        return view('post.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Post::find($id);

        $update->title   = $request->title;
        $update->comment = $request->comment;

        $update->save();

        return to_route('post.edit', ['id' => $request->id])
        ->with('message', $request->title . 'を更新しました！');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
