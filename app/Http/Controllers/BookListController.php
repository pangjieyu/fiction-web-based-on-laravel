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

    /**
     * @param $bookId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function addItem($bookId) {
//        dd($bookId);
        $book = Book::findOrFail($bookId);
        if(count(BookList::all()->where('bookId','=',$bookId)->where('userId','=',Auth::user()->id)->get()) == 0) {
            $bookList = new BookList();
            $bookList->userId = Auth::user()->id;
            $bookList->bookId = $bookId;
            $book->hits += 1;
            $book->save();
//        dd($bookList);

            $bookList->save();
        }
//        return redirect(route('allBook'))->with('success','已收藏');
        return redirect('/book/allBook')->with('success','已收藏');
    }

    //删除条目
    public function rmItem($id) {
        $book = BookList::findOrFail($id)->book;
//        dd($book);
        $book->hits -= 1;
        $book->save();
        BookList::destroy($id);
        return \redirect()->back();
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
