<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mainadmins')->insert([
            [
                'Name' => "Jay Mangukiya",
                'Email' => "jaymangukiya1614@gmail.com",
                'Password' => Hash::make('123456'),
            ],

            [
                'Name' => "Krupali Mathukiya",
                'Email' => "krupalimathukiya@gmail.com",
                'Password' => Hash::make('123456'),
                
            ]
        ]);
        // DB::table('adminregs')->insert([
        //     [
        //         'token' => "0",
        //         'profileimage' =>,
        //         'firstname' => "Jay",
        //         'lastname' => "Jay",
        //         'middlename' => "Jay",
        //         'education' => "Jay",
        //         'gender' => "Jay",
        //         'country' => "Jay",
        //         'city' => "Jay",
        //         'mobilenumber' => "Jay",
        //         'gstno' => "Jay",
        //         'bankname' => "Jay",
        //         'branchname' => "Jay",
        //         'ifsccode' => "Jay",
        //         'email' => "Jay",
        //         'password' => "Jay",
        //         'address' => "Jay",
        //         'message' => "Jay",

        //     ],

        // ]);
    }
}
