<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookContent;
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookContent  $bookContent
     * @return \Illuminate\Http\Response
     */
    public function show(BookContent $bookContent)
    {
        //
        return view(route('novel',compact('bookContent')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookContent  $bookContent
     * @return \Illuminate\Http\Response
     */
    public function edit(BookContent $bookContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookContent  $bookContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookContent $bookContent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookContent  $bookContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookContent $bookContent)
    {
        //
    }
}
