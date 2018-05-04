<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param $userId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * 个人作品列表
     */
    public function index() {
        $data = (new \App\Models\Book())->where('authorId','=',Auth::user()->id)->paginate(10);
        return view('book.myBook',compact('data'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function allBook() {
        $books = Book::all();
        return view('book.allBook',compact('books'));

    }
    public function destroy($bookId) {
        if(Book::find($bookId)->author()->id === Auth::user()->id) {
            Book::destroy($bookId);
            session()->flash('删除成功');
        } else {
            session()->flase('没有权限');
        }
        return redirect(route('my_book'));
    }
    public function newBook() {
        return view('book.new');
    }
    public function add() {
        $file = Request::file('file');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename().'.'.$extension, File::get($file));
        $entry = new \App\Models\File();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename().'.'.$extension;
        $entry->save();

        $book = new Book();
        $book->file_id = $entry->id;
        $book->title = Request::input('name');
        $book->bookIntroduction = Request::input('introduction');
        $book->authorName = Auth::user()->name;
        $book->authorId = Auth::user()->id;
        $book->cover = Storage::url($entry->filename);
    }

}
