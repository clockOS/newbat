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
