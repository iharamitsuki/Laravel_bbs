<!DOCTYPE html>
<html lang="ja">
<head>
    <title>{{ $title }}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <header class="p-3 mb-2 bg-white text-dark">
        <div class="d-flex container justify-content-between">
            <a href="{{ route('post.index') }}" class="bg-success text-white rounded p-2 text-decoration-none">Laravel掲示板</a>
            <div>
                @if (Auth::check())
                    <span class="me-4">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger">ログアウト</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-success">ログイン</a>
                    <a href="{{ route('register') }}" class="btn btn-success">新規登録</a>
                @endif
            </div>
        </div>
    </header>
    {{ $slot }}
</body>
</html>
