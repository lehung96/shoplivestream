<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_question', function (Blueprint $table) {
            $table->Increments('question_id');
            $table->string('question_name');
            $table->text('category_desc');
            $table->text('meta_keywords');
            $table->string('category_name');
            $table->text('question_content');
            $table->string('question_image');
            $table->integer('question_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_question');
    }
}
