<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller
{
    private $rCategory;

    /**
     * BookController constructor.
     */
    public function __construct(Category $category)
    {
        $this->rCategory = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aCategories = $this->rCategory
            ->get();
        return response()->json($aCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oCategory = $this->rCategory
            ->create($request->all());
        return response()->json($oCategory);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oCategory = $this->rCategory->find($id);
        return response()->json($oCategory);
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
        $oCategory = $this->rCategory->find($id);
        $oCategory->fill($request->all());
        $oCategoryUpdated = $oCategory->save();
        return response()->json($oCategoryUpdated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->rCategory->delete($id);
        $aCategories = $this->rCategory
            ->get();
        return response()->json($aCategories);

    }

    public function showBooks($id)
    {
        $aCategories = \App\Book::where('category_id', $id)->get();
        return response()->json($aCategories);
    }
}
