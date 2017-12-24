<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$user=User::find(1);
        $phone=User::find(1)->Phone;

        foreach ($phone as $v){
            echo $user->name;
            echo $v->phone."<br>";
        }*/

        /*$p=new Phone();
        $p->user_id="3";
        $p->phone="157";
        $p->save();
        return "OK";*/

        /*$p=Phone::where("user_id",2)->first();
        $p->phone=777;
        $p->save();
        return "OK";*/

        /*$p=Phone::find(4);
        $p->delete();
        return "OK";*/

        /*$p=Phone::all();
        return $p->sum("id");*/

        /*$p=Phone::find(6);
        $p->phone="asDFgDBG";
        return $p->phone;*/

        /*$p=Phone::all();
        return $p->toArray();*/

        /*$user=User::find(1);
        $user->email="更改后的email";
        $user->Phone->phone="更改后的phone";
        $user->save();
        $user->Phone->save();
        return "ok";*/

        $phone=DB::table("phones")->get(["phone"]);
        //$phone=DB::table("phones")->pluck("phone");
        return $phone;

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
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        //
    }
}
