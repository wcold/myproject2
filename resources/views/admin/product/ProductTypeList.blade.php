<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>产品类型列表</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>
<body>
@include("admin.Header")
<div class="container">
    <div class="row">
        @include("admin.product.ProductNav")
        <div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">
                    产品类型列表
                </div>
                <table class="table table-hover">
                    @foreach($rs as $v)
                    <tr >
                        <td >{{$v->name}}</td>
                        <td><a href="typeedit/{{$v->id}}"><button type="button" class="btn btn-info btn-sm">修改</button></a>|<a href="typedel/{{$v->id}}"><button type="button" class="btn btn-info btn-sm">删除</button></a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


</body>
</html>