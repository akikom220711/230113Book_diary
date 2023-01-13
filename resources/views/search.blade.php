@extends('layouts.template')

@section('title')
Book diary
@endsection

@section('content')

<div class="search_box">
  <form action="/search" method="GET">
    <p class="search_keyword"><input type="text" name="keyword" placeholder="書名で検索"></p>
    <p class="search_keyword">
      <select name="category">
        <option value="0">all ganre</option>
        @foreach ($categories as $category)
          <option value="{{ $category->id }}">{{ $category->category }}</option>
        @endforeach
      </select>
    </p>
    <input class="search_submit" type="submit" value="検索">
  </form>
</div>

<div class="result_container">
  <h1>　検索結果：</h1>
  @foreach ($results as $result)
    <div class="result_box">
      <img class="result_img" src="{{$result->url}}" alt="No image">
      <div class="result_div">
      <p class="result_title"><a class="result_list_a" href="/showbook/{{ $result->id }}">{{ $result->title }}</a></p>
      <p class="result_date">{{ $result->read_date }}</p>
      </div>
    </div>
  @endforeach

  <div class="pagi_region">
  {{$results->appends(request()->query())->links('vendor.pagination.default_modify')}}
</div>

</div>

@endsection