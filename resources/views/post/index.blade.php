<x-bbs-index>
    <x-slot:title>LaravelBBS</x-slot:title>
    <div class="mx-auto" style="width: 900px;">
        @if (Auth::check())
        新規投稿
        @endif
        <x-bbs-list/>
    </div>
</x-bbs-index>
