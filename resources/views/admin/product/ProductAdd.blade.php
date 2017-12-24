<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>产品添加</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="{{asset('/js/jquery-3.2.1.js')}}"></script>
    <script src="{{asset('/js/jQuery-form.js')}}"></script>
    <script src="/kindeditor/kindeditor-all.js"></script>
    <script src="/js/jQuery-form.js"></script>
    <style>
        #preview img{
            width:30%;
            height:30%;
        }
    </style>
</head>
<body>
@include("admin.Header")
<div class="container">
    <div class="row">
        @include("admin.product.ProductNav")
        <div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">
                    添加产品
                </div>
                <div class="panel-body">
                    <form id="myform" class="form-horizontal" action="/admin/padd" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="exampleInputEmail1">产品名称</label>
                                <input type="text" name="name" class="form-control" placeholder="请输入产品名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <label for="exampleInputEmail1">产品类型</label>
                                <select class="form-control" name="type_id" id="">
                                    <option value="0">所有类型</option>
                                    @foreach($types as $v)
                                        <option value="{{$v->id}}">{{$v->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="exampleInputEmail1">产品价格</label>
                                <input type="text" name="price" class="form-control" placeholder="产品价格">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="exampleInputFile">产品图片</label>
                                <div style="position: relative">
                                <div id="choosepic" class="btn btn-info btn-sm">
                                    选择文件
                                </div>
                                <input multiple="true" type="file" name="pic[]" style="position: absolute;left: 0;top: 0;opacity: 0" >
                                </div>
                                <div id="preview">

                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="exampleInputPassword1">产品详情</label>
                                <textarea name="detail" class="form-control" cols="30" rows="15">产品详情...</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-2">
                                <input class="btn btn-info" type="submit" value="确定添加">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
        $("#myform").submit(function () {
            var ajax_option={
                url:"/admin/padd",
                type:"post",
                datatype:"json",

                success:function(data) {
                    /*var img="";
                    for(var i in data){
                        img += '<img src="http://pic.com/'+data[i]+'">';
                    }
                    $("#preview").html(img);
                    console.log(data);*/
                    if(data==1){
                        alert("添加成功");
                        location.href="/admin/plist";
                    }else if(data==2){
                        alert("你上传的不是图片，请选择图片");
                        location.href="/admin/plist";
                    }else{
                        alert("添加失败");
                        location.href="/admin/plist";
                    }
                },
                error:function () {
                    console.log("fail");
                },
            }
            $("#myform").ajaxSubmit(ajax_option);

            return false;
        })
    })
</script>
<script>
    KindEditor.ready(function(K) {
        var editor1 = K.create('textarea[name="detail"]', {
            cssPath : '/kindeditor/plugins/code/prettify.css',
            uploadJson : '/kindeditor/asp/upload_json.asp',
            fileManagerJson : '../asp/file_manager_json.asp',
            allowFileManager : true,
            /*afterCreate : function() {
                var self = this;
                K.ctrl(document, 13, function() {
                    self.sync();
                    K('form[name=example]')[0].submit();
                });
                K.ctrl(self.edit.doc, 13, function() {
                    self.sync();
                    K('form[name=example]')[0].submit();
                });
            }*/
        });
        //prettyPrint();
    });
</script>
</body>
</html>