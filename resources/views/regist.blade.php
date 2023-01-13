@extends('layouts.template')

@section('title')
Book diary
@endsection

@section('content')

<div class="regist_box">
  <h2 class="regist_title">利用者登録</h2>
  <form action="/regist" method="post">
    @csrf
    <table class="regist_table">
      <tr>
        <th class="regist_th">ユーザー名</th>
        <td class="regist_td">
          <input class="regist_input" type="text" name="name" value="{{old('name')}}">
          <p class="error">
            @if($errors->has('name'))
              {{ $errors->first('name') }}
            @endif
          </p>
        </td>
      </tr>
      <tr>
        <th class="regist_th">メールアドレス</th>
        <td class="regist_td">
          <input class="regist_input" type="email" name="email" value="{{old('email')}}">
          <p class="error">
            @if($errors->has('email'))
              {{ $errors->first('email') }}
            @endif
          </p>
        </td>
      </tr>
      <tr>
        <th class="regist_th">パスワード</th>
        <td class="regist_td">
          <input class="regist_input" type="password" name="password">
          <p class="error">
            @if($errors->has('password'))
              {{ $errors->first('password') }}
            @endif
          </p>
        </td>
      </tr>
    </table>
    <input class="regist_submit" type="submit" value="登録する">
  </form>
</div>

@endsection