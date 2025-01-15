<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    function index(){
        $sub_categories = SubCategory::all();
        return view('sub_category.index', compact('sub_categories'));

    
    }

    function add(){
       $categories = Category::all();
        return view('sub_category.add', compact('categories'));
    }

    function store(Request $req){

        $req->validate([
            'category_id' => 'required',
            'name' => 'required'
        ]);

        SubCategory::create([
            'category_id' => $req->category_id,
            'name' => $req->name
        ]);

        return redirect()->route('sub_category.index');
    }

    
}
