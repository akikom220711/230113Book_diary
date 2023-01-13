<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class Calender
{
  public function getCalender($year, $month){

    $first_date = $year . '-' . $month . '-01';
    $date02 = new Carbon($first_date);

    $date03 = $date02->copy()->subDay($date02->dayOfWeek);

    $count = $date02->daysInMonth + $date02->dayOfWeek;
    $count = ceil($count/7)*7;

    $dates = [];

    for ($i = 0; $i < $count; $i++, $date03->addDay()){
        $dates[$i] = $date03->copy();
    }

    return $dates;
  }

  public function getBookImg($title){
    $title = urlencode($title);
    $url = 'https://www.googleapis.com/books/v1/volumes?q=' . $title . '&country=JP&tbm=bks';
    $response = Http::get($url);
    $body = $response->getBody();
    $bodyArray = json_decode($body, true);
    $items = $bodyArray['items'];
    try {
        $img_url = $items[0]['volumeInfo']['imageLinks']['thumbnail'];
    }catch(\Throwable $e){
        $img_url = '/img/No_image.gif';
    }

    return $img_url;
  }

}