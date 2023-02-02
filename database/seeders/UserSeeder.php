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
                'profileimage' => 'jay.jpg',
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
                'token' => "1",
                'profileimage' => 'krupali.jpg',
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

        DB::table('users')->insert([
            [
                'FirstName' => "Jay ",
                'LastName' => " Mangukiya",
                'Address' => "110 ishvarnagar soc-2 Sitanagr road surat",
                'BirthDate' => "04-01-2003",
                'PhoneNo' => "9737520270",
                'Gender' => "Male",
                'Email' => "jaymangukiya1614@gmail.com",
                'Password' => Hash::make('123456'),
            ],

            [
                'FirstName' => "Krupali ",
                'LastName' => " Mathukiya",
                'Address' => "123 yoginagar -2 Yogichowk road surat",
                'BirthDate' => "30-09-2002",
                'PhoneNo' => "7434039039",
                'Gender' => "Female",
                'Email' => "krupalimathukiya6@gmail.com",
                'Password' => Hash::make('123456'),
            ],


        ]);

        DB::table('product_listings')->insert([
            [
                'AD_ID' => "BH0001 ",
                'token' => "1",
                'shopname' => " Jame's Creation",
                'category' => "1",
                'productname' => "Shirts",
                'price' => "500",
                'discount' => "20",
                'selling' => "400",
                'age' => '["0-6(Months)","6-24(Months)","2-4(Years)"]',
                'size' => '["XS,S"]',
                'collection' => '["Shirts"]',
                'color' => '["Black","Red","Green"]',
                'stock' => "InStock",
                'description' => "Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam ste et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.",
                'Ldescription' => " Vero diam ea vero et dolore rebum, dolor rebum eirmod cona sed justo. Magna takimata justo et amet magna et.",
                'productimage' => "shirt.jpg",


            ],

            [
                'AD_ID' => "BH0002 ",
                'token' => "1",
                'shopname' => " Krup's Creation",
                'category' => "2",
                'productname' => "Jeans",
                'price' => "400",
                'discount' => "20",
                'selling' => "320",
                'age' => '["0-6(Months)","6-24(Months)","2-4(Years)"]',
                'size' => '["XS,S"]',
                'collection' =>'["Jeans And Jeggings"]',
                'color' => '["Black","Red","Green"]',
                'stock' => "InStock",
                'description' => "Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam ste et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.",
                'Ldescription' => " Vero diam ea vero et dolore rebum, dolor rebum eirmod cona sed justo. Magna takimata justo et amet magna et.",
                'productimage' => "jeans.jpg",
            ],


        ]);
    }
}
