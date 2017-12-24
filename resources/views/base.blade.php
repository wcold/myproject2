<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="base.css">
    @yield("css")
</head>
<body>
<nav>网站导航</nav>
<header>网站头部</header>

@include("head")
<ul>
        @foreach($news as $v)
        <li>此用户为：{{$v["title1"]}}-{{$v["id"]}}</li>
        @endforeach
</ul>
@yield("diy")
@include("foot")
<footer>网站底部</footer>
</body>
</html>