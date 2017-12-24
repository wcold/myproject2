<?php

namespace App\Http\Controllers;

use App\Msg;
use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MsgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $msg=Msg::paginate(15);
        $reply=Reply::get();
        return view("msg.msglist",["msg"=>$msg,"reply"=>$reply]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("msg.msg");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()){
            $this->myRedirect('/login',"请先登录");
        }else{
            $user=Auth::user();
            $user_id=$user->id;
            $user_name=$user->name;
            $content=$request->input("content");
            $orm=new Msg();
            $orm->user_id=$user_id;
            $orm->user_name=$user_name;
            $orm->content=$content;
            if($orm->save()){
                $this->myRedirect("/msglist","留言成功");
            }else{
                $this->myRedirect("/msglist","留言失败");
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Msg  $msg
     * @return \Illuminate\Http\Response
     */
    public function show(Msg $msg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Msg  $msg
     * @return \Illuminate\Http\Response
     */
    public function edit(Msg $msg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Msg  $msg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Msg $msg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Msg  $msg
     * @return \Illuminate\Http\Response
     */
    public function destroy(Msg $msg)
    {
        //
    }

    public function myRedirect($url,$msg){
        echo "<script>
                alert('$msg');
                location.href='$url'
            </script>";
    }
}
