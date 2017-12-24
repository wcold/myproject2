<form method="post" action="{{route('reply.store')}}">
    {{csrf_field()}}
    <input type="hidden" name="msg_id" value="{{$id}}">
    <input type="text" name="reply" placeholder="请输入回复内容">
    <input type="submit" value="确定">
</form>