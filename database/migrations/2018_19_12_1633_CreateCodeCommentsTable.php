<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateCodeCommentsTable
{
    public function up()
    {
        Schema::create('codepress_comments', function (Blueprint $table){
           $table->increments('id');
           $table->text('content');
           $table->integer('post_id');
           $table->foreign('post_id')->references('id')->on('codepress_posts');
           $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('codepress_comments');
    }
}