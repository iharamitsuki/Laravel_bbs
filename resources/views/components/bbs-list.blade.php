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
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                        </svg>
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
