<x-bbs-index>
    <x-slot:title>edit</x-slot:title>
    <div class="w-75 p-3 container">
        <h4 class="">投稿編集</h4>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('post.update', ['id' => $edit->id]) }}" method="post" class="row g-2">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">タイトル</label>
                <input type="text"name="title" class="form-control" value="{{ $edit->title }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">内容</label>
                <textarea name="comment" class="form-control" rows="3">{{ $edit->comment }}</textarea>
            </div>
            <div class="d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success btn-lg">更新</button>
            </div>
        </form>
        <div class="d-md-flex justify-content-md-end">
            <a href="{{ route('post.index') }}" class="btn btn-outline-success mt-2">戻る</a>
        </div>
    </div>
</x-bbs-index>
