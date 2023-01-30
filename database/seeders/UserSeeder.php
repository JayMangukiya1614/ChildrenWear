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
                'Email' => "krupalimathukiya6@gmail.com",
                'Password' => Hash::make('123456'),
                
            ]
        ]);
        DB::table('adminregs')->insert([
            [
                'AD_ID' => "BH0001",
                'token' => "1",
                'profileimage' =>'jay.jpg',
                'firstname' => "Mangukiya",
                'middlename' => "Jay",
                'lastname' => "Dhirubhai",
                'shopname' => "Jem's Creation",
                'pincode' => "395010",
                'education' => "Postgraduate",
                'gender' => "Male",
                'state' => "Goa",
                'city' => "Delhi",
                'mobilenumber' => "9737520270",
                'gstno' => "07AAGFF2194N1Z1",
                'bankname' => "YES BANK",
                'branchname' => "VARACHA",
                'ifsccode' => "YESB0000400",
                'email' => "jaymangukiya1614@gmail.com",
                'password' => Hash::make('123456'),
                'address' => "110 ishvarnagar soc-2 Sitanagr road surat",
                'message' => "I hope you  you are accepet my account request",

            ],
            [
                'AD_ID' => "BH0002",
                'token' => "0",
                'profileimage' =>'krupali.jpg',
                'firstname' => "Mathukiya",
                'middlename' => "Krupali",
                'lastname' => "Prafulbhai",
                'shopname' => "Krup's Creation",
                'pincode' => "395010",
                'education' => "Postgraduate",
                'gender' => "Female",
                'state' => "Goa",
                'city' => "Delhi",
                'mobilenumber' => "7434039039",
                'gstno' => "08AAGFF2194N1Z1",
                'bankname' => "YES BANK",
                'branchname' => "VARACHA",
                'ifsccode' => "YESB0000400",
                'email' => "krupalimathukiya6@gmail.com",
                'password' => Hash::make('123456'),
                'address' => "123 yoginagar -2 Yogichowk road surat",
                'message' => "I hope you  you are accepet my account request",

            ],

        ]);
    }
}
