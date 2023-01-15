@extends('layouts.template')

@section('title')
Book diary
@endsection

@section('content')

<div id="app" class="unread_books_container">
  <h1 class="unread_books_h1">　つんどく（未読本）：</h1>
  <p class="unread_books_add" v-on:click="openModal">追加する</p>
  @foreach ($books as $book)
    <div class="unread_books_box">
      <img class="unread_books_img" src="{{ $book->url }}" alt="No image">
      <div class="unread_books_div">
        <p class="unread_books_title">{{ $book->title }}</p>
        <p class="unread_books_author">{{ $book->author }}</p>
      </div>
      <button class="unread_books_delete" onclick="location.href='/deleteunreadbook/{{ $book->id }}'">削除</button>
    </div>
  @endforeach

  <div class="pagi_region">
  {{$books->appends(request()->query())->links('vendor.pagination.default_modify')}}
  </div>

  <div v-show="isShow" v-on:click="closeModal" class="modal_back" v-cloak>
    <div class="unread_modal_window" v-on:click="stopEvent">
      <span v-on:click="closeModal" class="close">×</span>
      <form action="/createunreadbook" v-on:submit="checkForm_unread" method="post">
        @csrf
        <table class="modal_table">
          <tr>
            <th class="modal_table_th">タイトル：</th>
            <td class="modal_table_td">
              <input v-model="unread_title" class="modal_input" type="text" name="unread_title">
              <p class="error">@{{ errors[0] }}</p>
            </td>
          </tr>
          <tr>
            <th class="modal_table_th">著者名：</th>
            <td class="modal_table_td">
              <input v-model="unread_author" class="modal_input" type="text" name="unread_author">
              <p class="error">@{{ errors[1] }}</p>
            </td>
          </tr>
        </table>
        <input class="modal_submit" type="submit" value="追加する">
      </form>
    </div>
  </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>

@endsection