<table class="table caption-top">
    <caption>みんなの投稿</caption>
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">タイトル</th>
            <th scope="col">内容</th>
        @if (Auth::check())
            <th scope="col">いいね</th>
            <th scope="col"></th>
            <th scope="col"></th>
        @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td scope="row">{{ $post->id }}</td>
                <td>
                    <a href="{{ route('post.show', ['id' => $post->id]) }}" class="link-success text-decoration-none">{{ $post->title }}</a>
                </td>
                <td>{{ $post->comment }}</td>
                @if (Auth::check())
                    <td scope="col">
                        @if (!Auth::user()->likes($post->id))
                            <form method="post" action="{{ route('like.store', ['id' => $post->id]) }}">
                                @csrf
                                <button data-bs-toggle="button">
                                    <i class="bi bi-hand-thumbs-up"></i>
                                </button>
                            </form>
                        @else
                            <form method="post" action="{{ route('like.delete', ['id' => $post->id]) }}">
                                @csrf
                                <button data-bs-toggle="button">
                                    <i class="bi bi-hand-thumbs-up-fill"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                    <td scope="col">
                        @if (Auth::id() == $post->user_id)
                            <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-success btn-sm">編集</a>
                        @elseif (Auth::id() != $post->user_id)
                            <a href="{{ route('comment.create', ['id' => $post->id]) }}" class="btn btn-outline-success btn-sm">返信</a>
                        @endif
                    </td>
                    <td scope="col">
                        @if (Auth::id() == $post->user_id)
                            <form method="post" action="{{ route('post.delete', ['id' => $post->id]) }}">
                                @csrf
                                <input type="submit" class="btn btn-danger btn-sm" value="削除">
                            </form>
                        @endif
                    </td>
                @endif
            </tr>
            @if (Auth::check())
                @foreach ($post->comments as $comment)
                    <tr>
                        <td>>>{{ $post->id }}</td>
                        <td></td>
                        <td colspan="2">{{ $comment->comment }}</td>
                        <td scope="col">
                            @if (Auth::id() == $comment->user_id)
                                <a href="{{ route('comment.edit', ['id' => $comment->id]) }}" class="btn btn-success btn-sm">編集</a>
                            @endif
                        </td>
                        <td scope="col">
                            @if (Auth::id() == $comment->user_id)
                                <form method="post" action="{{ route('comment.delete', ['id' => $comment->id]) }}">
                                    @csrf
                                    <input type="submit" class="btn btn-danger btn-sm" value="削除">
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
        @endforeach
    </tbody>
</table>
