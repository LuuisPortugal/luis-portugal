<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $rBook;

    /**
     * BookController constructor.
     */
    public function __construct(Book $book)
    {
        $this->rBook = $book;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aBooks = $this->rBook
            ->with('author', 'category')
            ->orderBy('name')
            ->get();
        return response()->json($aBooks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oBook = $this->rBook
            ->create($request->all());
        return response()->json($oBook);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oBook = $this->rBook
            ->with('author', 'category')
            ->find($id);
        return response()->json($oBook);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oBook = $this->rBook->find($id);
        $oBook->fill($request->all());
        $oBookUpdated = $oBook->save();
        return response()->json($oBookUpdated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->rBook->delete($id);
        $aBooks = $this->rBook
            ->orderBy('name')
            ->get();
        return response()->json($aBooks);

    }
}
