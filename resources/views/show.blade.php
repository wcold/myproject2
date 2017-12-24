<h1>{{$news1->title}}</h1>
<div>{{$news1->content}}</div>
<div>
    @if($pre)
        <a href="{{$pre->id}}">{{$pre->title}}</a>
    @else
    <span>已经是最上一篇了</span>
    @endif
        @if($next)
            <a href="{{$next->id}}">{{$next->title}}</a>
        @else
            <span>已经是最后一篇了</span>
        @endif
</div>