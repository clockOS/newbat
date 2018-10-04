@if(\Auth::user()->level<$quest->min_level)
<span class="glyphicon glyphicon-time difficulty-text-4" aria-hidden="true"></span><span class="difficulty-text-4">等级不够
@endif
@if((\Auth::user()->level>=$quest->min_level)AND(@$quest->user_id!=\Auth::id()))
<span class="glyphicon glyphicon-folder-open difficulty-text-2" aria-hidden="true"></span><span class="difficulty-text-2">可以开始
@endif
@if((@$quest->user_id==\Auth::id())AND($state!="9"))
<span class="glyphicon glyphicon-play difficulty-text-3" aria-hidden="true"></span><span class="difficulty-text-3">进行中
@endif
@if($state=="9")
<span class="glyphicon glyphicon-ok difficulty-text-1" aria-hidden="true"></span><span class="difficulty-text-1">已完成
@endif
@if($state=="10")
<span class="glyphicon glyphicon-lock difficulty-text-5" aria-hidden="true"></span><span class="difficulty-text-1">已完成
@endif
</span>
&nbsp;
