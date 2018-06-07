<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookContent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Book $book
     * @return \Illuminate\Http\Response
     */
    public function index($bookId)
    {
        //
        $book = Book::findOrFail($bookId);
        $bookContent = $book->content;
//        dd($book);
//        dd($bookContent);
        return view('book.bookContent',['bookContent'=>$bookContent,'book'=>$book]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($bookId)
    {
        //
        $book = Book::findOrFail($bookId);
//        dd($book);
        return view('book.write',['book'=>$book]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $bookId)
    {
        //上传文章（富文本）
//        dd($request);
//        dd($bookId);
        $bookContent = new BookContent();
        $bookContent->chapterName = $request->chapterName;
        $bookContent->bookId = $bookId;
        $bookContent->chapterContent = $request->chapterContent;
        $bookContent->lastAlterTime = Carbon::now();
        $bookContent->save();
        return redirect()->route('chapterList',$bookId);
    }

    /**
     * Display the specified resource.
     *
     * @param $chapterId
     * @return \Illuminate\Http\Response
     */
    public function show($chapterId)
    {
        //
//        dd($chapterId);

        $novel = BookContent::findOrFail($chapterId);
//        dd($novel);
        return view('novels.novel',['chapterId'=>$chapterId,'novel'=>$novel]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookContent  $bookContent
     * @return \Illuminate\Http\Response
     */
    public function edit($bookId ,$chapterId)
    {
        //
        $novel = BookContent::findOrFail($chapterId);
        return view('book.edit',['bookId'=>$bookId,'novel'=>$novel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookContent  $bookContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $bookId, $chapterId)
    {
        //

//        dd($request);
        $data = [];
        $novel = BookContent::findOrfail($chapterId);
        $data['chapterName'] = $request->chapterName;
        $data['chapterContent'] = $request->chapterContent;
        $novel->update($data);
        return redirect(route('novel',$novel->chapterId));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookContent  $bookContent
     * @return \Illuminate\Http\Response
     */
    public function destroy($bookId,$chapterId)
    {
        //
        $bookcontent = BookContent::findOrFail($chapterId);
        $bookcontent->delete();
        return redirect()->back()->with('success','删除成功');
    }
}
