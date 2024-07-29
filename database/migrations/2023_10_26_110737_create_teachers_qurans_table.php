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
        Schema::create('teachers_qurans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quran_shcool_id');
            $table->unsignedBigInteger('qurans_categories_teachers_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image');
            $table->tinyInteger('status');
            $table->foreign('quran_shcool_id')->references('id')->on('schools')->onDelete('cascade'); 
            $table->foreign('qurans_categories_teachers_id')->references('id')->on('qurans_categories_students')->onDelete('cascade');
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
        Schema::dropIfExists('teachers_qurans');
    }
};
