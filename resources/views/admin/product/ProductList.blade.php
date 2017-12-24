<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>产品列表</title>
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
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($rs as $v)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-9">
                                    <input name="id" type="checkbox" value="{{$v->id}}">
                                    <input id="price" type="text" name="name" class="input-sm" value="{{$v->price}}">
                                    <a href="">{{$v->name}}</a>
                                </div>
                                <div class="col-md-3">
                                    <a href="pedit/{{$v->id}}"><button type="button" class="btn btn-info btn-sm">修改</button></a>|
                                    <a href="pdel/{{$v->id}}"><button type="button" class="btn btn-info btn-sm">删除</button></a>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li>
                                <a href="/admin/plist?page=1" aria-label="Previous">
                                    <span aria-hidden="true">首页</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/plist?page={{$curr-1}}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            @foreach($page as $k=>$v)
                                @if($k==$curr)
                                    <li class="active"><a href="/admin/plist?{{$v}}">{{$k}}</a></li>
                                @else
                                    <li><a href="/admin/plist?{{$v}}">{{$k}}</a></li>
                                @endif
                            @endforeach
                            <li>
                                <a href="/admin/plist?page={{$curr+1}}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/plist?page={{$max}}" aria-label="Previous">
                                    <span aria-hidden="true">尾页</span>
                                </a>
                            </li>
                            <li>
                                <span aria-hidden="true">总计{{$max}}页</span>
                            </li>

                        </ul>
                    </nav>
                </div>
                <div class="panel-footer">
                    <input id="checkall" type="checkbox" value="all">全选
                    <input id="changeprice" type="button" class="btn btn-info btn-sm" value="批量修改价格">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#checkall").change(function () {
        var flag=$(this).prop("checked");
        $('input[name="id"]').each(function () {
            $(this).prop("checked",flag);
        })
    })
    $("#changeprice").click(function () {
        var ids=[];
        $('input[name="id"]').each(function () {
            if($(this).prop("checked")){
                var id=parseInt($(this).val());
                ids[id]=$(this).next().val();
            }
        })
        console.log(ids);
        $.ajaxSetup({
            headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'}
        });
        $.post("/admin/batchupdate",{dt:ids},function (data) {
            if(data==1){
                alert("批量修改成功");
            }else{
                alert("批量修改失败");
            }
        })
    })
</script>
</body>
</html>