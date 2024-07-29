<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuranTeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers_qurans')->insert([
            'id'=>1, 
            'quran_shcool_id'=>1, 
            'qurans_categories_teachers_id'=>1,
            'first_name'=>'Ahmed', 
            'last_name'=>'Bourouba', 
            'address'=> 'Bab el-assa',
            'mobile'=> '0797257071',
            'email' => 'ismaildehaoui10@gmail.com',
            'password'=>'$2y$10$9KHDr/B97TjzQCstIovOSuARmPmd6m7DewtOvwLRZ6TFWVi3Yln0a',
            'image'=> '',
            'status'=> 1
        ]);
    }
}
