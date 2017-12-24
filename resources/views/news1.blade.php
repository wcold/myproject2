<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>title</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="/css/app.css">
    @yield("css")
</head>
<body>



<ul>
    @foreach($news1 as $v)
        <li><a href="/show/{{$v->id}}">{{$v->title}}</a><time>{{date("Y-m-d",strtotime($v->created_at))}}</time></li>
    @endforeach
    {{$news1->links()}}
</ul>

</body>
</html>