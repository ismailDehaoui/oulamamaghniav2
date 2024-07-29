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
        Schema::create('quran_subcription', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quran_student_id');
            $table->integer('price');
            $table->enum('beneficiary',['oui','non']);
            $table->dateTime('date_subscription');
            $table->dateTime('date_renewal');
            $table->dateTime('next_date_renewal');
            $table->integer('status');
            $table->foreign('quran_student_id')->references('id')->on('quran_studants')->onDelete('cascade'); 
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
        Schema::dropIfExists('quran_subcription');
    }
};
