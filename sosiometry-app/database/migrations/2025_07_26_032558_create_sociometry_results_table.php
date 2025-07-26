<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSociometryResultsTable extends Migration
{
    public function up()
    {
        Schema::create('sociometry_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('positive_score')->default(0);
            $table->integer('negative_score')->default(0);
            $table->integer('neutral_score')->default(0);
            $table->integer('total_score')->default(0);
            $table->json('choices_received')->nullable();
            $table->json('choices_given')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sociometry_results');
    }
}
