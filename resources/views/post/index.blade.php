<x-bbs-index>
    <x-slot:title>LaravelBBS</x-slot:title>
    <div class="mx-auto" style="width: 900px;">
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (Auth::check())
            <a href="{{ route('post.create') }}" class="btn btn-success">投稿する</a>
        @endif
        <!-- 一覧画面 -->
        <x-bbs-list :$posts />
    </div>
</x-bbs-index>
