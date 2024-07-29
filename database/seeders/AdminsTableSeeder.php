<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('admins')->insert([
            'id'=>2, 
            'first_name'=>'Ahmed', 
            'last_name'=>'Bourouba', 
            'type'=> 'Quran Teacher',
            'quran_teacher_id'=> 2,
            'mobile'=> '0797257071',
            'email' => 'ismaildehaoui10@gmail.com',
            'password'=>'$2y$10$9KHDr/B97TjzQCstIovOSuARmPmd6m7DewtOvwLRZ6TFWVi3Yln0a',
            'image'=> '',
            'status'=> 1
        ]);
        // $adminRecords = [
        //     [
        //         'id'=>1, 
        //         'first_name'=>'Ayoub', 
        //         'last_name'=>'Boubekeur', 
        //         'type'=> 'superadmin',
        //         'vendor_id'=> 0,
        //         'mobile'=> '0794525574',
        //         'email' => 'ayoub2013b27@gmail.com',
        //         'password'=>'$2y$10$j5kGH19IAXsUlGwkUgfZcudho.bkKj2LI88ztG4W9Eu4Rtt4xJwPm',
        //         'image'=> '',
        //         'status'=> 1

        //     ]
        // ];
        // Admin::creating($adminRecords);
    }
}
