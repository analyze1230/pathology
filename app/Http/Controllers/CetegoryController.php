<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Category;

class CetegoryController extends Controller
{
    function add(){

        return view('category.add');
    }


    function store(Request $req)
    {
         $validated=$req->validate([
          'name'=>'required'

         ]);
         Category::create($validated);
         return redirect()->route('category.index')->with("success","category created successfully");
    }   

    function index(){
       $categories=Category::all();

        return view('category.index',compact('categories'));
    }

    function edit($id)  {
     $categories=Category::find($id);

        return view('category.edit',compact('categories'));
        
    }
}
