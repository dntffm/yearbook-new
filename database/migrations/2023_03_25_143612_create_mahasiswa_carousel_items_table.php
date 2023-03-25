<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaCarouselItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_carousel_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('mhs_name');
            $table->string('jurusan');
            $table->string('quote');
            $table->string('tingkat')->nullable();
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
        Schema::dropIfExists('mahasiswa_carousel_items');
    }
}
