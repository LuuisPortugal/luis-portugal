<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private $rAuthor;

    /**
     * BookController constructor.
     */
    public function __construct(Author $author)
    {
        $this->rAuthor = $author;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aAuthors = $this->rAuthor
            ->get();
        return response()->json($aAuthors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oAuthor = $this->rAuthor
            ->create($request->all());
        return response()->json($oAuthor);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oAuthor = $this->rAuthor->find($id);
        return response()->json($oAuthor);
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
        $oAuthor = $this->rAuthor->find($id);
        $oAuthor->fill($request->all());
        $oAuthorUpdated = $oAuthor->save();
        return response()->json($oAuthorUpdated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->rAuthor->delete($id);
        $oAuthor = $this->rAuthor
            ->get();
        return response()->json($oAuthor);

    }
}
