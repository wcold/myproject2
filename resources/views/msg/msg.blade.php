{{--
<form method="post" action="{{route('msg.store')}}">
    {{csrf_field()}}
    <input name="title" type="text"><br>
    <input name="content" type="text">
    <input type="submit" value="提交">
</form>--}}
<form method="post" action="/msg">
    {{csrf_field()}}
    <input name="title" type="text"><br>
    <input name="content" type="text"><br>
    @guest
        <a href="/login"><input type="button" value="请先登录"><br></a>
    @else
        <input type="submit" value="提交留言"><br>
    @endguest
</form>