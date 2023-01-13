<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/reset.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <title>@yield('title')</title>
</head>

<body>
  @if(Auth::user())
    <header class="header">
      <h1 class="title">{{ Auth::user()->name }}さんの読書日記</h1>
      <div>
        <a class="menu" href="/">Home</a>
        <a class="menu" href="/unreadlist">つんどく</a>
        <a class="menu" href="/search">検索</a>
        <a class="menu" href="/setting">設定</a>
        <a class="menu" href="/userlogout">ログアウト</a>
      </div>
    </header>
  @else
    <header class="header">
      <h1 class="title">読書日記</h1>
      <div>
        <a class="menu" href="/regist">新規登録</a>
        <a class="menu" href="/userlogin">ログイン</a>
      </div>
    </header>
  @endif

    @yield('content')

  <footer class="footer"></footer>
</body>

</html>