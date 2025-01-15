<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;


class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {     $tests=Test::with(['Category','SubCategory'])->get();
        return view('test.index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories = Category::all();
        $sub_categories=SubCategory::all();
        return view('test.add',compact('categories','sub_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'category_id'=>'required',
           'sub_category_id'=>"required",
            'name'=>'required',
            'upper_value'=>'required',

        ]);
        Test::create($request->all());
        return redirect('test')->with("test created successfully");
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {     $tests=test::all();
         $categories=Category::all();
         $sub_categories=SubCategory::all();
         

        return view('test.edit',compact('tests','categories','sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        //
    }
}
