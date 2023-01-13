@extends('layouts.template')

@section('title')
Book diary
@endsection

@section('content')

<div class="update_box">
  <form action="/updatebook/{{$book->id}}" method="POST">
    @csrf
    <table class="update_table">
      <tr>
        <th class="update_th">読了日：</th>
        <td class="update_td">
          <input class="update_input" type="date" name="date" value="{{ $book->read_date }}">
        </td>
      </tr>
      <tr>
        <th class="update_th">タイトル：</th>
        <td class="update_td">
          <input class="update_input" type="text" name="title" value="{{ $book->title }}">
        </td>
      </tr>
      <tr>
        <th class="update_th">著者名：</th>
        <td class="update_td">
          <input class="update_input" type="text" name="author" value="{{ $book->author }}">
        </td>
      </tr>
      <tr>
        <th class="update_th">出版社：</th>
        <td class="update_td">
          <input class="update_input" type="text" name="publisher" value="{{ $book->publisher }}">
        </td>
      </tr>
      <tr>
        <th class="update_th">出版年：</th>
        <td class="update_td">
          <input class="update_input" type="text" name="year" value="{{ $book->published_year }}">
        </td>
      </tr>
      <tr>
        <th class="update_th">感想：</th>
        <td class="update_td">
          <textarea class="update_textarea" name="comment" cols="30" rows="5">{{ $book->comment }}</textarea>
        </td>
      </tr>
      <tr>
        <th class="update_th">ジャンル：</th>
        <td class="update_td">
          <select name="category">
            @foreach ($categories as $category)
              @if ($book->category_id == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->category }}</option>
              @else
                <option value="{{ $category->id }}">{{ $category->category }}</option>
              @endif
            @endforeach
          </select>
        </td>
      </tr>
    </table>
    <input class="update_submit" type="submit" value="変更する">
  </form>

</div>

@endsection