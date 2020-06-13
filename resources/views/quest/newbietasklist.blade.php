<style type="text/css">
.quest-type{
    position: absolute;
    right:18px;
    bottom: 0;
    text-align: right;
    color: white;
    text-shadow: rgba(0,0,09, 0.5) 1px 1px 6px;
    font-size: 18px;
}
.quest-level{
    position: absolute;
    left: 2px;
    color: #FFF;
    top: 18px;
    text-align: center;
    width: 50px;
}
.quest-title{
    word-wrap: break-word;
}
.btn-group-justified{
    margin-bottom: 20px;
}
</style>
@extends('app')
@section('content')
    <h1>新手帮助</h1>
    <hr/>

    <div id="quests-list">

        <a href="https://www.bilibili.com/video/BV1MT4y1J7f1/" class="col-md-6 col-lg-4" target="_blank">
            <div class="panel panel-default">
                <img src="https://cdn.cooldevelop.com/img/types/invite.png">
                <div class="panel-body">
                        <h3>   1. 获取推广代码</h3>
                </div>
            </div>
        </a>
        
        <a href="https://youtube.com" class="col-md-6 col-lg-4">
            <div class="panel panel-default">
                <img src="https://cdn.cooldevelop.com/img/types/jobs.png">
                <div class="panel-body">
                        <h3>   2. 选择你的技能</h3>
                </div>
            </div>
        </a>
        
        <a href="https://youtube.com" class="col-md-6 col-lg-4">
            <div class="panel panel-default">
                <img src="https://cdn.cooldevelop.com/img/types/task.png">
                <div class="panel-body">
                    <div class="list-first-row">
                        <div class="quests-list-title">创建一个任务</div>
                    </div>
                </div>
            </div>
        </a>
        
        <a href="https://youtube.com" class="col-md-6 col-lg-4">
            <div class="panel panel-default">
                <img src="https://cdn.cooldevelop.com/img/types/decision.png">
                <div class="panel-body">
                    <div class="list-first-row">
                        <div class="quests-list-title">执行一个任务</div>
                    </div>
                </div>
            </div>
        </a>
        
        <a href="https://youtube.com" class="col-md-6 col-lg-4">
            <div class="panel panel-default">
                <img src="https://cdn.cooldevelop.com/img/types/vote.png">
                <div class="panel-body">
                    <div class="list-first-row">
                        <div class="quests-list-title">参与决策</div>
                    </div>
                </div>
            </div>
        </a>

    </div>

@stop

@section('footer')
    <script>
    </script>
@endsection
