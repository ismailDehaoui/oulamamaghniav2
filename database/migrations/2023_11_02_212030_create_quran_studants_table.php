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
        Schema::create('quran_studants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quran_shcool_id');
            $table->unsignedBigInteger('quran_category_student_id');
            $table->unsignedBigInteger('father_id');
            $table->unsignedBigInteger('mother_id');
            $table->string("firstName")->nullable();
            $table->string("lastName")->nullable();
            $table->enum("sexe",['Homme','Femme']);
            $table->string('image');
            $table->string('birth_certificate');
            $table->date('dateOfBirthday');
            $table->enum('statut',[
                        'عادي','يتيم الاب','يتيم الام','يتيم الابوين','الوالدين مطلقين'

                         ])->default('عادي');
            $table->boolean('malad')->nullable();
            $table->string('type_malade')->nullable();
            $table->enum('statut_familly',['ميسورة','متوسطة','ضعيفة'])->default('ميسورة');
            $table->integer('N_parties_the_Koran');
            $table->integer('current_party');
            $table->foreign('quran_category_student_id')->references('id')->on('qurans_categories_students')->onDelete('cascade');
            $table->foreign('quran_shcool_id')->references('id')->on('schools')->onDelete('cascade'); 
            $table->foreign('father_id')->references('id')->on('parents')->onDelete('cascade');
            $table->foreign('mother_id')->references('id')->on('parents')->onDelete('cascade');
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
        Schema::dropIfExists('quran_studants');
    }
};
