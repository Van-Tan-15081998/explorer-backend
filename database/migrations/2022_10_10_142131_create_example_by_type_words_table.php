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
        Schema::create('example_by_type_words', function (Blueprint $table) {
            $table->id();
            $table->text('example');
            $table->bigInteger('word_id');
            $table->bigInteger('type_word_id');
            $table->bigInteger('word_mean_id');
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
        Schema::dropIfExists('example_by_type_words');
    }
};
