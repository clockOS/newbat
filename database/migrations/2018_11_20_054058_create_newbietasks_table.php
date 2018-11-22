<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewbietasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newbietasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('entitle');                  //英文标题
            $table->text('body');
            $table->text('enbody');                     //英文详情
            $table->unsignedTinyInteger('difficulty')->default(2);
            $table->string('type');
            $table->unsignedTinyInteger('min_level')->default(1);
            $table->unsignedInteger('stock');
            $table->unsignedInteger('vote');
            $table->unsignedInteger('experience');
            $table->string('fullname');
            $table->string('enfullname');
            $table->string('lang');
            $table->timestamp('created_at'); 
            $table->timestamp('updated_at'); 
            $table->timestamp('published_at');      //任务公开时间

            $table->index(['fullname', 'enfullname']);
        });

        DB::insert("
        
        INSERT INTO `newbietasks` (`id`, `title`, `entitle`, `body`, `enbody`, `difficulty`, `type`, `min_level`, `stock`, `fullname`, `enfullname`, `lang`, `published_at`, `created_at`, `updated_at`, `vote`, `experience`)
            VALUES

                (1, '[新手任务] 关注YouTube频道', '', '- 在YouTube `Setting-History & Privacy`中取消勾选 `Keep all my subscriptions private`\r\n- 关注 FuckBAT YouTube频道\r\n- https://www.youtube.com/channel/UCn0H8v3FpopbgAvzHld7l1A\r\n', '', 1, 'youtube', 2, 2, '其它-审核中-[新手任务] 关注YouTube频道', '', '', '0000-00-00 00:00:00', '2018-10-03 00:00:37', '2018-10-03 00:01:12', 5, 40),
                (2, '[新手任务] 邀请一个人加入到FuckBAT', '', '- 分享FuckBAT并邀请注册\r\n- 查看自己的推广代码（在`管理-团队`中查看 https://fuckb.at/team）\r\n- 告诉被邀请者你的推广代码\r\n- 被邀请者进入`管理-团队`中输入你的邀请码\r\n- 确认邀请关系', '', 1, 'invite', 9, 8, '推广-审核中-[新手任务] 邀请一个人加入到FuckBAT', '', '', '0000-00-00 00:00:00', '2018-10-03 00:08:24', '2018-10-03 00:08:24', 0, 0),
                (3, '[新手任务] 转职-选择你的职业', '', '选择你的职业', '', 1, 'jobs', 8, 10, '其它-审核中-[新手任务] 转职-选择你的职业', '', '', '0000-00-00 00:00:00', '2018-10-03 00:10:59', '2018-10-03 00:10:59', 0, 0),
                (4, '[新手任务] 加入Slack Channel和Telegram Channel', '', '- Slack Channel: https://join.slack.com/t/fuckbat/shared_invite/enQtNDQyMjU2ODY2MjYyLTgxZWIzZDRkYWM4YzQyNDNjZWJiMTFkMjgxMjI4NDcxZjIwZDgzNWI1ZmRiZmUyNGNiMTBhYmZlYzk1ZDViMDk\r\n- Telegram Channel: https://t.me/joinchat/AAAAAE5dBakuhUBvFHHVlw', '', 1, 'slack', 1, 1, '行政-审核中-[新手任务] 加入Slack Channel和Telegram Channel', '', '', '0000-00-00 00:00:00', '2018-10-03 09:48:30', '2018-10-03 09:48:30', 5, 30),
                (5, '[新手任务] 参与决策', '', '进入这个决策并投票\r\nhttps://fuckb.at/decision/6', '', 1, 'vote', 3, 3, '其它-审核中-[新手任务] 参与决策', '', '', '0000-00-00 00:00:00', '2018-10-03 10:43:15', '2018-10-03 10:43:34', 10, 80),
                (6, '[新手任务] 发起一项决策', '', '发起一项决策，并设置5个选项', '', 1, 'decision', 4, 4, '其它-审核中-[新手任务] 发起一项决策', '', '', '0000-00-00 00:00:00', '2018-10-03 10:50:46', '2018-10-03 10:52:46', 20, 120),
                (7, '[新手任务] 创建一个新任务', '', '创建一个有意义的任务', '', 1, 'task', 5, 5, '其它-审核中-[新手任务] 创建一个新任务', '', '', '0000-00-00 00:00:00', '2018-10-03 10:57:30', '2018-10-03 10:57:30', 30, 200);
                    
        ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('newbietasks');
    }
}
