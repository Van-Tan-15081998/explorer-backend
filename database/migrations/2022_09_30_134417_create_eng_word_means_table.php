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
        Schema::create('eng_word_means', function (Blueprint $table) {
            $table->id();
            $table->text('mean');
            $table->text('example')->nullable();
            $table->bigInteger('word_id');
            $table->bigInteger('type_word_id');
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
        Schema::dropIfExists('eng_word_means');
    }
};
