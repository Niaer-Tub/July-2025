<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsesTable extends Migration
{
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained()->onDelete('cascade');
            $table->foreignId('responder_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('users')->onDelete('cascade');
            $table->integer('score')->default(0);
            $table->timestamps();

            $table->unique(['question_id', 'responder_id', 'subject_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('responses');
    }
};
