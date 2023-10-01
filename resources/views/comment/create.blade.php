<x-bbs-index>
    <x-slot:title>Comment</x-slot:title>
    <div class="w-75 p-3 container">
        <h4 class="">{{ $comment->title }}に返信する</h4>
        <form action="{{ route('comment.store') }}" method="post" class="row g-2">
            @csrf
            <div class="mb-3">
                <label class="form-label">コメント</label>
                <textarea name="comment" class="form-control" rows="3"></textarea>
            </div>
            <div class="d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success btn-lg">返信</button>
            </div>
        </form>
        <div class="d-md-flex justify-content-md-end">
            <a href="{{ route('post.index') }}" class="btn btn-outline-success mt-2">戻る</a>
        </div>
    </div>
</x-bbs-index>
