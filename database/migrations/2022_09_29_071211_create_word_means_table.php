<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('word_means', function (Blueprint $table) {
            $table->id();
            $table->text('mean');
            $table->bigInteger('word_id');
            $table->bigInteger('type_word_id')->default(0);
            $table->boolean('is_popularity')->default(false);
            $table->boolean('is_vie_mean')->default(false);
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
        Schema::dropIfExists('word_means');
    }
};
