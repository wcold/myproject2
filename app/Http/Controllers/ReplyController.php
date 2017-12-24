<?php

namespace App\Http\Controllers;

use App\Reply;
use App\Msg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=request()->get("id",0);
        return view("msg.reply",compact("id"));
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
        if(!Auth::user()){
            $this->myRedirect("/login","请先登录");
        }else{
            $msg_id=$request->input("msg_id");
            $reply=$request->input("reply");
            $user=Auth::user();
            $reply_name=$user->name;
            $orm=new Reply();
            $orm->msg_id=$msg_id;
            $orm->reply=$reply;
            $orm->reply_name=$reply_name;
            $orm2=Msg::find($msg_id);
            $orm2->reply=1;
            if($orm->save()){
                $orm2->save();
                $this->myRedirect("/msglist","回复成功");
            }else{
                $this->myRedirect("/msglist","回复失败");
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
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
