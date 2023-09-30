<x-bbs-index>
    <x-slot:title>NewPost</x-slot:title>
    <div class="w-75 p-3 container">
        <h4 class="">新規投稿</h4>
        <form action="" method="post" class="row g-2">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">タイトル</label>
                <input type="email" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">内容</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-success mb-3">投稿</button>
            </div>
        </form>
    </div>
</x-bbs-index>
