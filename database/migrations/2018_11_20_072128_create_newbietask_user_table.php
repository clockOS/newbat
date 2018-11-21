<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewbietaskUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newbietask_user', function (Blueprint $table) {
            $table->increments('cid');
            $table->integer('user_id')->unsigned();     //创建此任务用户的id
            $table->integer('checker_id')->unsigned()->nullable()->default(null);        //开发此任务用户的id
            $table->integer('task_id')->unsigned()->nullable()->default(null);;     //执行此任务用户的id
            $table->unsignedTinyInteger('state')->default(0);
            $table->timestamp('updated_at');      //任务公开时间
            $table->timestamp('completed')->nullable()->default(null);         //完成时间
            $table->timestamp('created_at');                   //创建时间
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('newbietask_user');
    }
}
