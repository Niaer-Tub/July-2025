<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('answer_user', function (Blueprint $table) {
        $table->id();
        $table->foreignId('answer_id')->constrained()->onDelete('cascade');
        $table->foreignId('friend_id')->constrained('users')->onDelete('cascade'); // friend selected
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answer_user');
    }
};
