<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 个人作品列表
     */
    public function index($userId) {
        $thisUser = User::find($userId);
        $data = $thisUser->book;
        return view('book.myBook',compact('data'));
    }
}
