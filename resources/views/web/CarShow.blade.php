<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>购物车</title>
</head>
<body>
@include("web.Head")
<div style="width: 80%;margin: 0 auto;">
    <div class="panel panel-info">
        <div class="panel-heading">
            商品列表
        </div>
        <div class="panel-body">
            <table class="table table-hover table-bordered">
                <thead>
                <tr class="success">
                    <th style="width: 30%" class="text-center">商品名称</th>
                    <th style="width: 10%" class="text-center">商品属性</th>
                    <th style="width: 10%" class="text-center">市场价</th>
                    <th style="width: 10%" class="text-center">本店价</th>
                    <th style="width: 15%" class="text-center">购买数量</th>
                    <th style="width: 10%" class="text-center">小计</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                @if(session("car"))
                @foreach(session("car") as $k=>$v)
                <tr >
                    <td>{{$v["name"]}}</td>
                    <td class="text-right">颜色：白色</td>
                    <td class="text-right">{{$v["price"]}}</td>
                    <td class="text-right" style="color: red;">￥{{$v["price"]}}.00</td>
                    <td class="text-right">
                        <div class="input-group">
                            <div class="input-group-addon btn " style="width: 35%"><a href="/car/decr/{{$k}}">-</a></div>
                            <input type="text" class="form-control" value="{{$v["num"]}}" readonly>
                            <div class="input-group-addon btn " style="width: 35%"><a href="/car/adcr/{{$k}}">+</a></div>
                        </div>
                    </td>
                    <td class="text-right" style="color: red;">￥{{$v["num"]*$v["price"]}}.00</td>
                    <td>
                        <a href="/car/pay/{{$k}}"><input type="button" class="btn btn-sm btn-info" value="购买"></a>
                        <a href="/car/del/{{$k}}"><input type="button" class="btn btn-sm btn-info" value="删除"></a>
                    </td>
                </tr>
                @endforeach
                @else
                    <tr >
                        <td></td>
                        <td class="text-right"></td>
                        <td class="text-right"></td>
                        <td class="text-right" style="color: red;"></td>
                        <td class="text-right"></td>
                        <td class="text-right" style="color: red;"></td>
                        <td class="text-right"></td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        <div class="panel-footer">
            <div class="text-right">
                购物金额总计<span style="color: red">￥{{$allprice}}.00</span>，比市场价￥{{$allprice}}.00节省￥0.00元
                <a href="/car/allpay"><input type="button" class="btn btn-info" value="全部购买"></a>
                <a href="/car/clear"><input type="button" class="btn btn-default" value="清空购物车"></a>
            </div>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">
            收货人信息
        </div>
        <div class="panel-body">
            <table class="table table-hover table-bordered">
                <thead>
                <tr class="success">
                    <th class="text-center">收货人姓名</th>
                    <th class="text-center">联系方式</th>
                    <th class="text-center">收货地址</th>
                    <th class="text-center">邮政编码</th>
                </tr>
                </thead>
                <tbody>
                    <tr >
                        <td class="text-center">路人甲</td>
                        <td class="text-center">17396795555</td>
                        <td class="text-center">浙江省衢州市柯城区...</td>
                        <td class="text-center">324000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">
            其他信息
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="col-sm-9">
                    <label for="exampleInputPassword1">订单附言：</label>
                    <textarea name="detail" class="form-control" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
{{--
@foreach(session("car") as $k=>$v)
    <div> {{$k}}-{{$v["name"]}}</div>
    <div> {{$k}}-{{$v["price"]}}</div>
    <div> {{$k}}-{{$v["num"]}}</div>
@endforeach--}}
