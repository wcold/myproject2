<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
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
        $types=ProductType::all(['id','name']);
        return view("admin.product.ProductAdd",compact("types"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type_id=$request->input("type_id");
        $name=$request->input("name");
        $price=$request->input("price");

        $files = $request->file('pic');
        $pics="";
        foreach ($files as $file){
            // 文件是否上传成功
            if ($file->isValid()) {

                // 获取文件相关信息
                $originalName = $file->getClientOriginalName(); // 文件原名
                $ext = $file->getClientOriginalExtension();     // 扩展名
                $realPath = $file->getRealPath();   //临时文件的绝对路径
                $type = $file->getClientMimeType();     // image/jpeg
                $size=$file->getClientSize();
                $types=["image/jpeg","image/png","image/gif"];
                if($size>5*1024*1024){
                    exit("wenjian>5M");
                }

                // 上传文件
                $filename = date('Y-m-d') . '-' . uniqid() . '.' . $ext;
                $pics .="uploads/".$filename."#";
                // 使用我们新建的uploads本地存储空间（目录）
                $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                //var_dump($bool);

            }
        }
        /*$dir=storage_path('app\uploads');
        //return $dir;
        $img = Image::make($dir."2017-10-20-59e9661162782.jpg")->resize(300, 200);
        $img->save($dir.'\bar.jpg');
        return $img->response('jpg');*/

        //return "200";
        if(in_array($type,$types)) {
            $pics = trim($pics, "#");

            //$pic="uploads/".$filename;
            $detail = $request->input("detail");
            $orm = new Product();

            $orm->type_id = $type_id;
            $orm->name = $name;
            $orm->price = $price;
            $orm->pic = $pics;
            $orm->detail = $detail;
            if ($orm->save()) {
                /*$pics=explode("#",$pics);
                return $pics;*/
                return 1;
            } else {
                return 0;
            }
            /*$pics=explode("#",$pics);
            return $pics;*/
            //$json=json_encode($pics);
        }else{
            return 2;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $orm=new Product();
        $num=$orm->count();
        $cnt=4;
        $max=ceil($num/$cnt);
        $arr=range(1,$max);
        $curr=isset($_GET['page'])?$_GET['page']:1;
        if(in_array($curr,$arr)){
            $left=max(1,$curr-1);
            $right=min($left+2,$max);
            $left=max(1,$right-2);
            $page=[];
            for($i=$left;$i<=$right;$i++){
                $page[$i]="page=".$i;
            }
            $offset=($curr-1)*$cnt;
            $rs=Product::offset($offset)->limit($cnt)->get();
            //$rs=Product::all();
            return view("admin.product.ProductList",["rs"=>$rs,"page"=>$page,"curr"=>$curr,"max"=>$max]);
        }else{
            $this->myRedirect("/admin/plist","查找的页面不存在");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $types=ProductType::all();
        $pics=$product->pic;
        $pics=explode("#",$pics);
        $pics=array_filter($pics);
        return view("admin.product.ProductEdit",["types"=>$types,"product"=>$product,"pics"=>$pics]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $id=$request->input("id");

        $type_id=$request->input("type_id");
        $name=$request->input("name");
        $price=$request->input("price");
        $oldpic=$request->input("oldpic");

        $files = $request->file('pic');
        $pics="";
        if(!empty($files)){
            foreach ($files as $file){
                // 文件是否上传成功
                if ($file->isValid()) {

                    // 获取文件相关信息
                    $originalName = $file->getClientOriginalName(); // 文件原名
                    $ext = $file->getClientOriginalExtension();     // 扩展名
                    $realPath = $file->getRealPath();   //临时文件的绝对路径
                    $type = $file->getClientMimeType();     // image/jpeg
                    $types=["image/jpeg","image/png","image/gif"];
                    $size=$file->getClientSize();
                    if($size>5*1024*1024){
                        exit("wenjian>5M");
                    }

                    // 上传文件
                    $filename = date('Y-m-d') . '-' . uniqid() . '.' . $ext;
                    $pics .="uploads/".$filename."#";
                    // 使用我们新建的uploads本地存储空间（目录）
                    $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
                    //var_dump($bool);



                }
            }
        }
        if(in_array($type,$types)) {
            $pics .= $oldpic;
            $pics = trim($pics, "#");

            //$pic="uploads/".$filename;
            $detail = $request->input("detail");
            $orm = Product::find($id);
            $orm->type_id = $type_id;
            $orm->name = $name;
            $orm->price = $price;
            $orm->pic = $pics;
            $orm->detail = $detail;
            if ($orm->save()) {
                /*$pics=explode("#",$pics);
                return $pics;*/
                return 1;
            } else {
                return 0;
            }
        }else{
            return 2;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $id=$product->id;
        $rs=Product::find($id)->delete();
        if($rs){
            $this->myRedirect("/admin/plist","删除成功");
        }else{
            $this->myRedirect("/admin/plist","删除成功");
        }
    }

    public function batchUpdate(Request $request){
        //Log::info($request);
        $rs=$request->input("dt");
        $rs=array_filter($rs);
        //Log::info($rs);
        $sql="INSERT products (id,price) VALUES";
        foreach ($rs as $k=>$v){
            $sql.="($k,$v),";
        }
        $sql=trim($sql,",");
        $sql.="ON DUPLICATE KEY UPDATE price=VALUES(price)";
        $dt=DB::insert($sql);
        return $dt;
        /*if(DB::insert($sql)){
            return 1;
        }else{
            return 0;
        }*/
    }

    public function myRedirect($url,$msg){
        echo "<script>
                alert('$msg');
                location.href='$url'
            </script>";
    }

    //前端
    public function products(){
        $orm=new Product();
        $num=$orm->count();
        $cnt=6;
        $max=ceil($num/$cnt);
        $arr=range(1,$max);
        $curr=isset($_GET['page'])?$_GET['page']:1;
        if(in_array($curr,$arr)){
            $left=max(1,$curr-1);
            $right=min($left+2,$max);
            $left=max(1,$right-2);
            $page=[];
            for($i=$left;$i<=$right;$i++){
                $page[$i]="page=".$i;
            }
            $offset=($curr-1)*$cnt;
            $rs=Product::offset($offset)->limit($cnt)->get();
            //$rs=Product::all();
            return view("web.Products",["rs"=>$rs,"page"=>$page,"curr"=>$curr,"max"=>$max]);
        }else{
            $this->myRedirect("/web/products","查找的页面不存在");
        }
    }
}
