<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookList;
use App\Models\User;
use Illuminate\Http\Request;

class BookListController extends Controller
{
    //个人书架列表
    public function index(User $user) {
        $data = $user->bookList()->paginate(10);
/*        $cover
        $bookName
        $authorName
        $chapter*/



        return view('booklists.bookList',compact('data'));
    }

}
