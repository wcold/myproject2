<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>产品类型修改</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
@include("admin.Header")
<div class="container">
    <div class="row">
        @include("admin.product.ProductNav")
        <div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">
                    修改产品类型
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="/admin/typeupdate" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input name="id" type="hidden" value="{{$id}}">
                            <div class="col-sm-6">
                                <input type="text" name="typename" class="form-control" value="{{$name}}">
                            </div>
                            <div class="col-sm-2">
                                <input class="btn btn-info" type="submit" value="确定修改">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>