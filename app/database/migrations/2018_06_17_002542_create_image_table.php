<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image', function (Blueprint $table) {
            $table->string('id', 36)->nullable(false);
            $table->primary(['id']);
            $table->timestamps();
            $table->string('uploader_user_id', 36)->nullable(false);
            $table->foreign('uploader_user_id')->references('id')->on('user');
            $table->string('location_id', 36)->nullable(false);
            $table->foreign('location_id')->references('id')->on('location');
            $table->binary('raw_data', 16777215);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image');
    }
}
