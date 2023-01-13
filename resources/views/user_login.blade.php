@extends('layouts.template')

@section('title')
Book diary
@endsection

@section('content')

<div class="login_box">
  <h2 class="login_title">ログイン</h2>
  <form action="/userlogin" method="post">
    @csrf
    <table class="login_table">
      <tr>
        <th class="login_th">メールアドレス</th>
        <td class="login_td">
          <input class="login_input" type="email" name="email" value="{{old('email')}}">
          <p class="error">
            @if($errors->has('email'))
              {{ $errors->first('email') }}
            @endif
          </p>
        </td>
      </tr>
      <tr>
        <th class="login_th">パスワード</th>
        <td class="login_td">
          <input class="login_input" type="password" name="password">
          <p class="error">
            @if($errors->has('password'))
              {{ $errors->first('password') }}
            @endif
          </p>
        </td>
      </tr>
    </table>
    <input class="login_submit" type="submit" value="ログインする">
  </form>
</div>

@endsection