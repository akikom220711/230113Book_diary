<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Services\Calender;
use App\Models\Category;
use App\Models\Book;
use App\Models\UnreadBook;
use App\Models\Setting;

class BookDiaryController extends Controller
{
    public function index() {
        $today = new Carbon('today');
        $year = $today->year;
        $month = $today->month;

        $calender = new Calender;
        $dates = $calender->getCalender($year, $month); 

        $categories = Category::all();
        $books_img = Book::all();
        
        foreach ($books_img as $book_img){
            if (!$book_img->url){
                $img_url = $calender->getBookImg($book_img->title);
                Book::find($book_img->id)->update(['url' => $img_url]);
            }
        }
        
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $books = Book::where('user_id', '=', $user_id)->get();
            $settings = Setting::where('user_id', '=', $user_id)->get();
            $param = [
                'year' => $year,
                'month' => $month, 
                'dates' => $dates,
                'categories' => $categories,
                'books' => $books,
                'settings' => $settings
            ];
        }else{
            $param = [
                'year' => $year,
                'month' => $month, 
                'dates' => $dates,
                'categories' => $categories
            ];
        }

        return view('home', $param);
    }

    public function lastMonth(Request $request) {
        $year = $request->year;
        $month = $request->month;

        if ($month == 1){
            $year--;
            $month = 12;
        }else{
            $month--;
        }

        $calender = new Calender;
        $dates = $calender->getCalender($year, $month); 

        $categories = Category::all();
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $books = Book::where('user_id', '=', $user_id)->get();
            $settings = Setting::where('user_id', '=', $user_id)->get();
            $param = [
                'year' => $year,
                'month' => $month, 
                'dates' => $dates,
                'categories' => $categories,
                'books' => $books,
                'settings' => $settings
            ];
        }else{
            $param = [
                'year' => $year,
                'month' => $month, 
                'dates' => $dates,
                'categories' => $categories
            ];
        }

        return view('home', $param);
    }

    public function nextMonth(Request $request){
        $year = $request->year;
        $month = $request->month;

        if ($month == 12){
            $year++;
            $month = 1;
        }else{
            $month++;
        }

        $calender = new Calender;
        $dates = $calender->getCalender($year, $month); 

        $categories = Category::all();
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $books = Book::where('user_id', '=', $user_id)->get();
            $settings = Setting::where('user_id', '=', $user_id)->get();
            $param = [
                'year' => $year,
                'month' => $month, 
                'dates' => $dates,
                'categories' => $categories,
                'books' => $books,
                'settings' => $settings
            ];
        }else{
            $param = [
                'year' => $year,
                'month' => $month, 
                'dates' => $dates,
                'categories' => $categories
            ];
        }

        return view('home', $param);
    }

    public function registBook(Request $request){
        $user_id = Auth::user()->id;
        $form = [
            'user_id' => $user_id,
            'category_id' => $request->category,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'published_year' => $request->year,
            'comment' => $request->comment,
            'read_date' => $request->date
        ];
        Book::create($form);

        return redirect('/');
    }

    public function showBook($book_id){
        $book = Book::find($book_id);
        return view('show_book', ['book' => $book]);
    }

    public function goToUpdateBook($book_id){
        $book = Book::find($book_id);
        $categories = Category::all();

        return view('update_book', ['book' => $book, 'categories' => $categories]);
    }

    public function updatebook(Request $request, $book_id){
        $form = [
            'category_id' => $request->category,
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'published_year' => $request->year,
            'comment' => $request->comment,
            'read_date' => $request->date
        ];
        Book::find($book_id)->update($form);

        return redirect('/');
    }

    public function deleteBook($book_id){
        Book::find($book_id)->delete();
        return redirect('/');
    }

    public function search(Request $request){
        $user_id = Auth::user()->id;
        $categories = Category::all();

        $keyword = $request->only('keyword') ?? '';
        $category = $request->only('category');

        $query = Book::query();

        $query->where('user_id', '=', $user_id);
        if ($keyword){
            $key_str = $keyword['keyword'];
            $query->where('title', 'LIKE', "%$key_str%");
        }
        if ($category){
            $query->where('category_id', '=', $category);
        }
        $results = $query->orderBy('read_date')->Paginate(5);

        return view('search', ['categories' => $categories, 'results' => $results]);
    }

    public function showUnreadList(){
        $books_img = UnreadBook::all();
        $calender = new Calender;
        foreach ($books_img as $book_img){
            if (!$book_img->url){
                $img_url = $calender->getBookImg($book_img->title);
                UnreadBook::find($book_img->id)->update(['url' => $img_url]);
            }
        }

        $user_id = Auth::user()->id;
        $books = UnreadBook::where('user_id', '=', $user_id)->Paginate(5);

        return view('unread_book_list', ['books' => $books]);
    }

    public function deleteUnreadBook($unread_book_id){
        UnreadBook::find($unread_book_id)->delete();

        return redirect('/unreadlist');
    }

    public function createUnreadBook(Request $request){
        $user_id = Auth::user()->id;
        $form = [
            'user_id' => $user_id,
            'title' => $request->unread_title,
            'author' => $request->unread_author
        ];
        UnreadBook::create($form);

        return redirect('/unreadlist');
    }

    public function setting(){
        $user_id = Auth::user()->id;
        $settings = Setting::where('user_id', '=', $user_id)->get();
        if ($settings->isEmpty()){
            $settings = '';
        }
        $param=[
            'settings' => $settings
        ];
        return view('setting', $param);
    }

    public function changeSetting(Request $request){
        $user_id = Auth::user()->id;
        $form = [
            'user_id' => $user_id,
            'mystery_color' => $request->color_1,
            'fantasy_color' => $request->color_2,
            'SF_color' => $request->color_3,
            'nonfiction_color' => $request->color_4,
            'others_color' => $request->color_5
        ];

        $settings = Setting::where('user_id', '=', $user_id)->get();

        if($settings->isEmpty()){
            Setting::create($form);
        }else{
            Setting::where('user_id', '=', $user_id)->update($form);
        }

        return redirect('/');
    }
}
