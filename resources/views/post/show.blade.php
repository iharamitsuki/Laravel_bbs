<x-bbs-index>
    <x-slot:title>show</x-slot:title>
    <div class="w-75 p-3 container">
        <h4 class="">投稿詳細</h4>
        <div class="border border-success rounded p-2">
            <div class="mb-3">
                <label class="form-label">ID</label>
                <div type="text"name="title" class="form-control">{{ $detail->id }}</div>
            </div>
            <div class="mb-3">
                <label class="form-label">タイトル</label>
                <div type="text"name="title" class="form-control">{{ $detail->title }}</div>
            </div>
            <div class="mb-3">
                <label class="form-label">内容</label>
                <div name="comment" class="form-control" rows="3">{{ $detail->comment }}</div>
            </div>
            <div class="mb-3">
                <label class="form-label">投稿日時</label>
                <div name="comment" class="form-control" rows="3">{{ $detail->created_at }}</div>
            </div>
        </div>
        <a href="{{ route('post.index') }}" class="btn btn-success mt-2">戻る</a>
    </div>
</x-bbs-index>
