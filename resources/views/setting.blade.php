@extends('layouts.template')

@section('title')
Book diary
@endsection

@section('content')

<div class="setting_box">
  <h1 class="setting_title">設定</h1>
  <div>
    <h2 class="setting_detail">ジャンルの色設定</h2>
    <form action="/changesetting" method="POST">
      @csrf
        @if ($settings != null)
          @foreach ($settings as $setting)
            <table class="setting_table">
              <tr>
                <th class="setting_th">ミステリー：</th>
                <td><input type="color" name="color_1" value="{{ $setting->mystery_color }}"></td>
              </tr>
              <tr>
                <th class="setting_th">ファンタジー：</th>
                <td><input type="color" name="color_2" value="{{ $setting->fantasy_color }}"></td>
              </tr>
              <tr>
                <th class="setting_th">SF：</th>
                <td><input type="color" name="color_3" value="{{ $setting->SF_color }}"></td>
              </tr>
              <tr>
                <th class="setting_th">ノンフィクション：</th>
                <td><input type="color" name="color_4" value="{{ $setting->nonfiction_color }}"></td>
              </tr>
              <tr>
                <th class="setting_th">その他：</th>
                <td><input type="color" name="color_5" value="{{ $setting->others_color }}"></td>
              </tr>
            </table>
          @endforeach
        @else
          <table class="setting_table">
            <tr>
              <th class="setting_th">ミステリー：</th>
              <td><input type="color" name="color_1" value="#FCDE5B"></td>
            </tr>
            <tr>
              <th class="setting_th">ファンタジー：</th>
              <td><input type="color" name="color_2" value="#FCDE5B"></td>
            </tr>
            <tr>
              <th class="setting_th">SF：</th>
              <td><input type="color" name="color_3" value="#FCDE5B"></td>
            </tr>
            <tr>
              <th class="setting_th">ノンフィクション：</th>
              <td><input type="color" name="color_4" value="#FCDE5B"></td>
            </tr>
            <tr>
              <th class="setting_th">その他：</th>
              <td><input type="color" name="color_5" value="#FCDE5B"></td>
            </tr>
          </table>
        @endif
        


      <input class="setting_submit" type="submit" value="設定する">
    </form>
  </div>
  
</div>

@endsection