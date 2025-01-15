<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Test; 
use Spatie\Browsershot\Browsershot;
use Spatie\LaravelPdf\Facades\Pdf;




class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catagories = Category::all();
        $sub_catagories = SubCategory::all();
        $tests = Test::all();
        $reports = Report::all();
        return view('report.index',compact('catagories','sub_catagories','tests','reports'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {      
        $catagories = Category::all();
        $sub_catagories = SubCategory::all();
        $tests = Test::all();
      return view('report.add',compact('catagories','sub_catagories','tests'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $report=new Report();
        $report->Patient_name=$request->Patient_name;
        $report->Patient_age=$request->Patient_age;
        $report->refer_by_doctor=$request->refer_by_doctor;
        $report->category_id=$request->category_id;
        $report->sub_category_id=$request->sub_category_id;
        $report->test_id=$request->test_id;
        $report->Patient_result=$request->Patient_result;
        $report->save();
        return redirect('/report');
    
    


    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }
    function view($id){
        $report=Report::find($id);
        $template= view('report.view_report',['report'=>$report])->render();
        Browsershot::html($template)->save(storage_path('/app/public/report'.$report->id.'.pdf'));


        
    }
    }
