<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Product;

class CarController extends Controller
{
    public $car=array();
    public function add($id){
        $this->car=session("car");
        $rs=Product::find($id,["id","name","price","detail"]);
        if(isset($this->car[$id])){
            $this->car[$id]["num"]+=1;
        }else{
            $this->car[$id]["name"]=$rs["name"];
            $this->car[$id]["price"]=$rs["price"];
            $this->car[$id]["detail"]=$rs["detail"];
            $this->car[$id]["num"]=1;
        }
        Session(["car"=>$this->car]);
        $this->myRedirect("/products","加入购物车成功");
    }
    public function adcr($id){
        $this->car=session("car");
        $this->car[$id]["num"]+=1;
        Session(["car"=>$this->car]);
        echo "
          <script> 
            location.href='/car/show';
          </script>  
        ";
    }
    public function decr($id){
        $this->car=session("car");
        if(isset($this->car[$id])){
            $this->car[$id]["num"]-=1;
        }
        if($this->car[$id]["num"]==0){
            $this->del();
        }
        Session(["car"=>$this->car]);
        echo "
          <script> 
            location.href='/car/show';
          </script>  
        ";
    }
    public function del($id){
        $this->car=session("car");
        unset($this->car[$id]);
        Session(["car"=>$this->car]);
        $this->myRedirect("/car/show","删除成功");
    }
    public function clear(){
        \session(["car"=>""]);
        $this->myRedirect("/products","清空购物车成功");
    }
    public function show(){
        $this->car=session("car");
        $allprice=0;
        if(!empty($this->car)){
            foreach ($this->car as $k=>$v){
                $allprice=$allprice+$v["price"]*$v["num"];
            }
        }
        return view("web.CarShow",["allprice"=>$allprice]);
    }
    public function pay($id){
        $this->car=\session("car");
        $name=$this->car[$id]["name"]." ".$this->car[$id]["num"]."件";
        $money=$this->car[$id]["price"]*$this->car[$id]["num"];
        $detail=$this->car[$id]["detail"];
        return view("web.pay",["name"=>$name,"money"=>$money,"detail"=>$detail]);
    }
    public function allpay(){
        $this->car=session("car");
        $allprice=0;
        $name="";
        $detail="";
        if(!empty($this->car)){
            foreach ($this->car as $k=>$v){
                $allprice=$allprice+$v["price"]*$v["num"];
                $name=$v["name"];
            }
        }
        $name=$name."等";
        return view("web.pay",["name"=>$name,"money"=>$allprice,"detail"=>$detail]);
    }
    public function zpay($id){
        $orm=Product::find($id,["name","price","detail"]);
        $name=$orm->name."1件";
        $money=$orm->price;
        $detail=$orm->detail;
        return view("web.pay",["name"=>$name,"money"=>$money,"detail"=>$detail]);
    }
    public function myRedirect($url,$message){
        echo "
          <script>
            alert('$message');
            location.href='$url';
          </script>  
        ";
    }
}
