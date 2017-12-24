<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>产品类型添加</title>
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
                    添加产品类型
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="/admin/typeadd" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-sm-6">
                                <input type="text" name="typename" class="form-control" placeholder="请输入产品类型名称">
                            </div>
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
</body>
</html>