<?php

namespace Database\Seeders;

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
        DB::table('admins')->delete();
        $adminRecords =[
            [
              'id'=>1,'name'=>'admin','type'=>'admin','mobile'=>'0947772368','email'=>'hoa@gmail.com',
                'password'=>'$2y$10$EI/Y4wgWAOG8IdFUa3wLH.LY7EVH5kTBwTN0na7wG8JWlJ21nFu2W','image'=>'','status'=>1
            ],

            [
                'id'=>2,'name'=>'hieu','type'=>'subAdmin','mobile'=>'0947772362','email'=>'hieu@gmail.com',
                'password'=>'$2y$10$EI/Y4wgWAOG8IdFUa3wLH.LY7EVH5kTBwTN0na7wG8JWlJ21nFu2W','image'=>'','status'=>1
            ],

            [
                'id'=>3,'name'=>'nghia','type'=>'subAdmin','mobile'=>'0947772363','email'=>'nghia@gmail.com',
                'password'=>'$2y$10$EI/Y4wgWAOG8IdFUa3wLH.LY7EVH5kTBwTN0na7wG8JWlJ21nFu2W','image'=>'','status'=>1
            ],

            [
                'id'=>4,'name'=>'linh','type'=>'admin','mobile'=>'0947772364','email'=>'linh@gmail.com',
                'password'=>'$2y$10$EI/Y4wgWAOG8IdFUa3wLH.LY7EVH5kTBwTN0na7wG8JWlJ21nFu2W','image'=>'','status'=>1
            ],
        ];

        DB::table('admins')->insert($adminRecords);
//        foreach ($adminRecords as $key => $record){
//            \App\Models\Admin::create($record);
//        }
    }
}
