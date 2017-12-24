<?php

namespace App\Http\Controllers;

use App\News1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class News1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rs=DB::table('news1s')->paginate(15);
        return view('news1',['news1'=>$rs]);
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
     * @param  \App\News1  $news1
     * @return \Illuminate\Http\Response
     */
    public function show(News1 $news1)
    {
        //return $news1;
        $id=$news1->id;
        $pre=News1::where('id','<',$id)->orderby('id','desc')->first(['id','title']);
        $next=DB::table('news1s')->where('id','>',$id)->orderby('id','asc')->first(['id','title']);
        return view('show',['news1'=>$news1,'pre'=>$pre,'next'=>$next]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News1  $news1
     * @return \Illuminate\Http\Response
     */
    public function edit(News1 $news1)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News1  $news1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News1 $news1)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News1  $news1
     * @return \Illuminate\Http\Response
     */
    public function destroy(News1 $news1)
    {
        //
    }
}
