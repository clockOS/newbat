@if(\Auth::user()->level<$quest->min_level)
<span class="glyphicon glyphicon-time difficulty-text-4" aria-hidden="true"></span><span class="difficulty-text-4">等级不够
@endif
@if(($state=="7")AND(\Auth::user()->level>=$quest->min_level))
<span class="glyphicon glyphicon-folder-open difficulty-text-2" aria-hidden="true"></span><span class="difficulty-text-2">可以开始
@endif
@if($state=="8")
<span class="glyphicon glyphicon-play difficulty-text-3" aria-hidden="true"></span><span class="difficulty-text-3">进行中
@endif
@if($state=="9")
<span class="glyphicon glyphicon-ok difficulty-text-1" aria-hidden="true"></span><span class="difficulty-text-1">已完成
@endif
</span>
&nbsp;
@if(@$quest->user_id==\Auth::id())
    [{{trans('show.created_by')}}]
@endif
