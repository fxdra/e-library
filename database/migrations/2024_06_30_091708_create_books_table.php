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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('writer')->nullable();
            $table->string('image')->nullable();
            $table->string('quantity')->nullable();
            $table->string('isbn')->nullable();
            $table->string('languange')->nullable();
            $table->string('publisher')->nullable();
            $table->string('date_published')->nullable();
            $table->string('format')->nullable();
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
        Schema::dropIfExists('books');
    }
};
