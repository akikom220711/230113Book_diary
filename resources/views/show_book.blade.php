@extends('layouts.template')

@section('title')
Book diary
@endsection

@section('content')


<table class="show_table">
  <tr>
    <th class="show_table_th">読了日：</th>
    <td class="show_table_td">
      {{$book->read_date}}
    </td>
  </tr>
  <tr>
    <th class="show_table_th">タイトル：</th>
    <td class="show_table_td">
      {{$book->title}}
    </td>
  </tr>
  <tr>
    <th class="show_table_th">著者名：</th>
    <td class="show_table_td">
      {{$book->author}}
    </td>
  </tr>
  <tr>
    <th class="show_table_th">出版社：</th>
    <td class="show_table_td">
      {{$book->publisher}}
    </td>
  </tr>
  <tr>
    <th class="show_table_th">出版年：</th>
    <td class="show_table_td">
      {{$book->published_year}}
    </td>
  </tr>
  <tr>
    <th class="show_table_th">感想：</th>
    <td class="show_table_td">
      {{$book->comment}}
    </textarea></td>
  </tr>
  <tr>
    <th class="show_table_th">ジャンル：</th>
    <td class="show_table_td">
      {{$book->category->category}}
    </td>
  </tr>
</table>

<div class="show_btn_box">
  <button class="show_btn" onclick="location.href='/'">カレンダーへ</button>
  <button class="show_btn" onclick="location.href='/updatebook/{{$book->id}}'">修正</button>
  <button class="show_btn" onclick="location.href='/deletebook/{{$book->id}}'">削除</button>
</div>

@endsection