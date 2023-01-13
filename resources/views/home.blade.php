@extends('layouts.template')

@section('title')
Book diary
@endsection

@section('content')

<div id="app">
  <div class="calender_title">
    <a class="calender_title_link" href="/lastmonth/{{$year}}/{{$month}}"><</a>
    <p class="calender_title_font">{{ $month }}</p>
    <a class="calender_title_link" href="/nextmonth/{{$year}}/{{$month}}">></a>
  </div>

  @if (Auth::user())

    @foreach($settings as $setting)
      <span v-cloak>@{{sendColor(@json($setting))}}</span>
    @endforeach

    <table class="calender_table">
      <tr>
        <th class="calender_th">日</th>
        <th class="calender_th">月</th>
        <th class="calender_th">火</th>
        <th class="calender_th">水</th>
        <th class="calender_th">木</th>
        <th class="calender_th">金</th>
        <th class="calender_th">土</th>
      </tr>

      @php $counter=0; @endphp
      @foreach ($dates as $date)
        @if ($counter == 0)
          <tr>
            @if ($date->month != $month)
              <td class="calender_td">
                <p v-on:click="openModal(); sendDate('{{$date->format('Y-m-d')}}')" class="calender_days red trans">{{ $date->day }}</p>
                <ul class="calender_ul">
                  @foreach($books as $book)
                    @if ($book->read_date == $date->format('Y-m-d'))
                      @switch ($book->category_id)
                        @case (1)
                          <li v-bind:style="mystery_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (2)
                          <li v-bind:style="fantasy_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (3)
                          <li v-bind:style="SF_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (4)
                          <li v-bind:style="nonfiction_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (5)
                          <li v-bind:style="others_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @default
                          <li class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                      @endswitch
                    @endif
                  @endforeach
                </ul>
              </td>
            @else
              <td class="calender_td">
                <p v-on:click="openModal(); sendDate('{{$date->format('Y-m-d')}}')" class="calender_days red">{{ $date->day }}</p>
                <ul class="calender_ul">
                  @foreach($books as $book)
                    @if ($book->read_date == $date->format('Y-m-d'))
                      @switch ($book->category_id)
                        @case (1)
                          <li v-bind:style="mystery_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (2)
                          <li v-bind:style="fantasy_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (3)
                          <li v-bind:style="SF_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (4)
                          <li v-bind:style="nonfiction_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (5)
                          <li v-bind:style="others_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @default
                          <li class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                      @endswitch
                    @endif
                  @endforeach
                </ul>
              </td>
            @endif
            @php $counter++; @endphp
        @elseif (1<=$counter && $counter<=5)
            @if ($date->month != $month)
              <td class="calender_td">
                <p v-on:click="openModal(); sendDate('{{$date->format('Y-m-d')}}')" class="calender_days trans">{{ $date->day }}</p>
                <ul class="calender_ul">
                  @foreach($books as $book)
                    @if ($book->read_date == $date->format('Y-m-d'))
                      @switch ($book->category_id)
                        @case (1)
                          <li v-bind:style="mystery_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (2)
                          <li v-bind:style="fantasy_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (3)
                          <li v-bind:style="SF_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (4)
                          <li v-bind:style="nonfiction_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (5)
                          <li v-bind:style="others_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @default
                          <li class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                      @endswitch
                    @endif
                  @endforeach
                </ul>
              </td>
            @else
              <td class="calender_td">
                <p v-on:click="openModal(); sendDate('{{$date->format('Y-m-d')}}')" class="calender_days">{{ $date->day }}</p>
                <ul class="calender_ul">
                  @foreach($books as $book)
                    @if ($book->read_date == $date->format('Y-m-d'))
                      @switch ($book->category_id)
                        @case (1)
                          <li v-bind:style="mystery_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (2)
                          <li v-bind:style="fantasy_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (3)
                          <li v-bind:style="SF_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (4)
                          <li v-bind:style="nonfiction_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (5)
                          <li v-bind:style="others_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @default
                          <li class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                      @endswitch
                    @endif
                  @endforeach
                </ul>
              </td>
            @endif
            @php $counter++; @endphp
        @elseif ($counter == 6)
            @if ($date->month != $month)
              <td class="calender_td">
                <p v-on:click="openModal(); sendDate('{{$date->format('Y-m-d')}}')" class="calender_days blue trans">{{ $date->day }}</p>
                <ul class="calender_ul">
                  @foreach($books as $book)
                    @if ($book->read_date == $date->format('Y-m-d'))
                      @switch ($book->category_id)
                        @case (1)
                          <li v-bind:style="mystery_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (2)
                          <li v-bind:style="fantasy_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (3)
                          <li v-bind:style="SF_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (4)
                          <li v-bind:style="nonfiction_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (5)
                          <li v-bind:style="others_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @default
                          <li class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                      @endswitch
                    @endif
                  @endforeach
                </ul>
              </td>
            @else
              <td class="calender_td">
                <p v-on:click="openModal(); sendDate('{{$date->format('Y-m-d')}}')" class="calender_days blue">{{ $date->day }}</p>
                <ul class="calender_ul">
                  @foreach($books as $book)
                    @if ($book->read_date == $date->format('Y-m-d'))
                      @switch ($book->category_id)
                        @case (1)
                          <li v-bind:style="mystery_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (2)
                          <li v-bind:style="fantasy_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (3)
                          <li v-bind:style="SF_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (4)
                          <li v-bind:style="nonfiction_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @case (5)
                          <li v-bind:style="others_color" class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                          @break
                        @default
                          <li class="calender_list"><a class="calender_list_a" href="/showbook/{{$book->id}}">{{ $book->title }}</a></li>
                      @endswitch
                    @endif
                  @endforeach
                </ul>
              </td>
            @endif
          </tr>
          @php $counter=0; @endphp
        @endif
      @endforeach

    </table>

    <div v-show="isShow" v-on:click="closeModal" class="modal_back" v-cloak>
      <div class="modal_window" v-on:click="stopEvent">
        <span v-on:click="closeModal" class="close">×</span>
        <form action="/registbook" method="post">
          @csrf
          <table class="modal_table">
            <tr>
              <th class="modal_table_th">読了日：</th>
              <td class="modal_table_td">
                <input v-bind:value="date" class="modal_input" type="date" name="date">
              </td>
            </tr>
            <tr>
              <th class="modal_table_th">タイトル：</th>
              <td class="modal_table_td">
                <input v-bind:value="title" class="modal_input" type="text" name="title">
              </td>
            </tr>
            <tr>
              <th class="modal_table_th">著者名：</th>
              <td class="modal_table_td">
                <input v-bind:value="author" class="modal_input" type="text" name="author">
              </td>
            </tr>
            <tr>
              <th class="modal_table_th">出版社：</th>
              <td class="modal_table_td"><input v-bind:value="publisher" class="modal_input" type="text" name="publisher"></td>
            </tr>
            <tr>
              <th class="modal_table_th">出版年：</th>
              <td class="modal_table_td">
                <input v-bind:value="year" class="modal_input" type="text" name="year">
              </td>
            </tr>
            <tr>
              <th class="modal_table_th">感想：</th>
              <td class="modal_table_td_big"><textarea v-bind:value="comment" class="modal_textarea" name="comment" cols="30" rows="5"></textarea></td>
            </tr>
            <tr>
              <th class="modal_table_th">ジャンル：</th>
              <td class="modal_table_td">
                <select v-bind:value="category" name="category">
                  @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->category }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
          </table>
          <input class="modal_submit" type="submit" value="追加する">
        </form>
      </div>
    </div>

  @else
        <table class="calender_table">
      <tr>
        <th class="calender_th">日</th>
        <th class="calender_th">月</th>
        <th class="calender_th">火</th>
        <th class="calender_th">水</th>
        <th class="calender_th">木</th>
        <th class="calender_th">金</th>
        <th class="calender_th">土</th>
      </tr>

      @php $counter=0; @endphp
      @foreach ($dates as $date)
        @if ($counter == 0)
          <tr>
            @if ($date->month != $month)
              <td class="calender_td"><p class="calender_days red trans">{{ $date->day }}</p></td>
            @else
              <td class="calender_td"><p class="calender_days red">{{ $date->day }}</p></td>
            @endif
            @php $counter++; @endphp
        @elseif (1<=$counter && $counter<=5)
            @if ($date->month != $month)
              <td class="calender_td"><p class="calender_days trans">{{ $date->day }}</p></td>
            @else
              <td class="calender_td"><p class="calender_days">{{ $date->day }}</p></td>
            @endif
            @php $counter++; @endphp
        @elseif ($counter == 6)
            @if ($date->month != $month)
              <td class="calender_td"><p class="calender_days blue trans">{{ $date->day }}</p></td>
            @else
              <td class="calender_td"><p class="calender_days blue">{{ $date->day }}</p></td>
            @endif
          </tr>
          @php $counter=0; @endphp
        @endif
        
      @endforeach

    </table>
  @endif

</div>

<script src="{{ mix('js/app.js') }}"></script>
@endsection