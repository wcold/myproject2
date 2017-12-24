<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("admin.product.ProductTypeAdd") ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typename=$request->input("typename");
        $orm=new ProductType();
        $orm->name=$typename;
        if($orm->save()){
            //return "类型添加成功";
            $this->myRedirect('typelist','添加成功');
        }else{
            $this->myRedirect('typelist','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $rs=ProductType::all();
        return view("admin.product.ProductTypeList",compact("rs"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType)
    {
        $id=$productType->id;
        $name=$productType->name;
        return view("admin.product.ProductTypeEdit",["id"=>$id,"name"=>$name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $productType)
    {
        $id=$request->input("id");
        $name=$request->input("typename");
        $productType=ProductType::find($id);
        $productType->name=$name;
        if($productType->save()){
            $this->myRedirect('typelist','修改成功');
        }else{
            $this->myRedirect('typelist','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {
        $id=$productType->id;
        $rs=ProductType::find($id)->delete();
        if($rs){
            $this->myRedirect('/admin/typelist','删除成功');
        }else{
            $this->myRedirect('/admin/typelist','删除失败');
        }
    }

    public function myRedirect($url,$msg){
        echo "<script>
                alert('$msg');
                location.href='$url'
            </script>";
    }
}
