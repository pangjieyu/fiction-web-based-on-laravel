<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BookListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //添加书架
    public function addItem($bookId) {
        $bookList = new BookList();
        $bookList->userId = Auth::user()->id;
        $bookList->bookId = $bookId;
        $bookList->save();
        session()->flash('SUCCESS!');
        return \redirect('/book/allBook');
    }

    //删除条目
    public function rmItem($id) {
        BookList::destroy($id);
    }

    //个人书架列表
    public function index() {
        $data = (new \App\Models\BookList)->where('userId','=',Auth::user()->id)->paginate(10);
//        $data = $thisUser->bookList->paginate(10);
//        $cover = Book::select('cover')->where('bookId',$user->bookList->bookId);
//        $bookName
//        $authorName
//        $chapter
        return view('booklists.bookList',compact('data'));
    }

    public function store(Request $request) {

    }

}
