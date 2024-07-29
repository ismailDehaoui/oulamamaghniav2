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
        Schema::table('quran_subcriptions', function (Blueprint $table) {
        $table->string("beneficiaire")->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quran_subcriptions', function (Blueprint $table) {
            $table->enum('beneficiaire',["yes","no"])->change();
        });
    }
};
