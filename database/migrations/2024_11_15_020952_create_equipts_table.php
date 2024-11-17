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
        Schema::create('equipts', function (Blueprint $table) {
            $table->id();
            $table->string('fasilitas');
            $table->integer('unit');
            $table->integer('kapasitas');
            $table->string('kondisi');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('gallery_id')->constrained('galleries')->onDelete('cascade');
            $table->foreignId('tools_category_id')->constrained('tools_category')->onDelete('cascade');
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
        Schema::dropIfExists('equipts');
    }
};
