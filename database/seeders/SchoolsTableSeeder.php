<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schools')->insert([
            'id'=>1, 
            'school_name'=>'نادي أنس بن مالك', 
            'school_address'=>'حي العزوني', 
            'school_description'=> 'نادي لتعليم القرءان و الدروس الخصوصية',
            'school_mobile'=> '0770401501',
            'email' => 'ayoub2013b27@gmail.com',
            'school_image'=> '',
        ]);
    }
}
