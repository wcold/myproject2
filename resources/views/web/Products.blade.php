<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商城</title>
</head>
<body>
@include("web.Head")
<div style="width: 80%;margin: 0 auto;">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        产品中心
                        <span style="margin-left: 80%;">
                            <a href="/car/show"><button class="btn btn-info btn-sm">我的购物车</button></a>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach($rs as $k=>$v)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <img src="http://pic.com/uploads/p1.jpg" alt="">
                                    <div class="caption">
                                        <h3>{{$v->name}}</h3>
                                        <p>
                                            PHP后台工程师任你游
                                        </p>
                                        <p>价格:￥{{$v->price}}.00</p>
                                        <p><a href="/car/zpay/{{$v->id}}" class="btn btn-info btn-sm">直接购买</a>
                                            <a href="/car/add/{{$v->id}}" class="btn btn-default btn-sm">加入购物车</a></p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li>
                                    <a href="/products?page=1" aria-label="Previous">
                                        <span aria-hidden="true">首页</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/products?page={{$curr-1}}" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                @foreach($page as $k=>$v)
                                    @if($k==$curr)
                                        <li class="active"><a href="/products?{{$v}}">{{$k}}</a></li>
                                    @else
                                        <li><a href="/products?{{$v}}">{{$k}}</a></li>
                                    @endif
                                @endforeach
                                <li>
                                    <a href="/products?page={{$curr+1}}" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/products?page={{$max}}" aria-label="Previous">
                                        <span aria-hidden="true">尾页</span>
                                    </a>
                                </li>
                                <li>
                                    <span aria-hidden="true">总计{{$max}}页</span>
                                </li>

                            </ul>
                            </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        HTML
                    </a>
                    <a href="/admin/plist" class="list-group-item">111</a>
                    <a href="/admin/padd" class="list-group-item">222</a>
                    <a href="/admin/padd" class="list-group-item">333</a>
                </div>

                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        JS
                    </a>
                    <a href="/admin/typelist" class="list-group-item">111</a>
                    <a href="/admin/typeadd" class="list-group-item">222</a>
                    <a href="/admin/typeadd" class="list-group-item">333</a>
                </div>
                <div class="list-group">
                    <a href="#" class="list-group-item active">
                        PHP
                    </a>
                    <a href="/admin/typelist" class="list-group-item">111</a>
                    <a href="/admin/typeadd" class="list-group-item">222</a>
                    <a href="/admin/typeadd" class="list-group-item">333</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>