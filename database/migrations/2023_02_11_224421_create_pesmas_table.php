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
        Schema::create('pesmas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('duration');
            $table->string('publishingHouse');
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->foreignId('author_id');
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
        Schema::dropIfExists('pesmas');
    }
};
