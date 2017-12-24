<ul>
    @foreach($msg as $v)
    <li>
        {{$v->content}}
        <a href="/reply?id={{$v->id}}">回复</a>
        @if($v->reply==1)
            @foreach($reply as $v2)
            <div>{{$v2->reply_name}}:{{$v2->reply}}{{$v2->created_at}}</div>
            @endforeach
        @endif
    </li>
    @endforeach
</ul>
{{$msg->links()}}
<hr>
<a href="/msg">留言</a>