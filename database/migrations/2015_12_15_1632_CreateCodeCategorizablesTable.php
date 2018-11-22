<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;


class CreateCodeCategorizablesTable extends Migration
{
    protected $table = 'codepress_categorizables';

    public function up()
    {
        Schema::create('codepress_categorizables', function (Blueprint $table){
            $table->integer('category_id');
            $table->integer('categorizable_id');
            $table->string('categorizable_type');
        });
    }

    public function down()
    {
        Schema::drop('codepress_categorizables');
    }
}