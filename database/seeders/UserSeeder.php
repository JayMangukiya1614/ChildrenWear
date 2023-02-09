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
    DB::table('indices')->insert([
      [
        'title' => "Welcome To Our Website",
        'subtitle' => "Fashionable Dress",
        'image' => 'b1.jpg',
      ],

      [
        'title' => "Welcome To Our Website",
        'subtitle' => "Reasonable Price",
        'image' => 'b2.jpg',

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
        'password' => Hash::make('Jay@123'),
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
                'password' => Hash::make('Krups@123'),
                'address' => "123 yoginagar -2 Yogichowk road surat",
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
        'password' => Hash::make('Jay@123'),
        'address' => "123 yoginagar -2 Yogichowk road surat",
        'message' => "I hope you  you are accepet my account request",

      ],
      [
        'AD_ID' => "BH0003",
        'token' => "1",
        'profileimage' => 'default.jpeg',
        'firstname' => "Admin",
        'middlename' => "Admin",
        'lastname' => "Admin",
        'shopname' => "Admin's Creation",
        'pincode' => "395010",
        'education' => "Postgraduate",
        'gender' => "Male",
        'state' => "Goa",
        'city' => "Delhi",
        'mobilenumber' => "7434039039",
        'gstno' => "08AAGFF2194N1Z1",
        'bankname' => "YES BANK",
        'branchname' => "VARACHA",
        'ifsccode' => "YESB0000400",
        'email' => "Admin@gmail.com",
        'password' => Hash::make('Admin@123'),
        'address' => "Admin",
        'message' => "I hope you  you are accepet my account request",

      ],


    ]);

    DB::table('users')->insert([
      [
        'CI_ID' => "CI0001",
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
        'CI_ID' => "CI0002",
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
            // shirt 
            [
                'AD_ID' => "BH0001 ",
                'token' => "1",
                'shopname' => " Jame's Creation",
                'category' => "1",
                'productname' => "Colorful Stylish Shirtaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                'price' => "500",
                'discount' => "20",
                'selling' => "400",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',
                'size' => '["XS","S"]',
                'collection' => '1',
                'color' => '["Black","Red","Green"]',
                'stock' => "2",
                'description' => "Lorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia no",
                'Ldescription' => "Lorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel,",
                'productimage' => "shirt.jpg",
                'created_at' => '2023-02-08 03:50:10',
                'updated_at' => '2023-02-08 03:50:15',


            ],
            [
                'AD_ID' => "BH0001 ",
                'token' => "1",
                'shopname' => " Jame's Creation",
                'category' => "1",
                'productname' => "Colorful Stylish Shirt",
                'price' => "400",
                'discount' => "10",
                'selling' => "360",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',
                'size' => '["XS","S"]',
                'collection' => '1',
                'color' => '["Black","Red","Green"]',
                'stock' => "1",
                'description' => "Lorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia no",
                'Ldescription' => "Lorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel,",
                'productimage' => "shirt.jpg",
                'created_at' => '2023-02-08 03:50:05',
                'updated_at' => '2023-02-08 03:50:14',


            ],   [
                'AD_ID' => "BH0001 ",
                'token' => "1",
                'shopname' => " Jame's Creation",
                'category' => "1",
                'productname' => "Colorful Stylish Shirt",
                'price' => "500",
                'discount' => "20",
                'selling' => "400",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',
                'size' => '["XS","S"]',
                'collection' => '1',
                'color' => '["Black","Red","Green"]',
                'stock' => "1",
                'description' => "Lorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia no",
                'Ldescription' => "Lorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel,",
                'productimage' => "shirt.jpg",
                'created_at' => '2023-02-08 03:50:04',
                'updated_at' => '2023-02-08 03:50:13',


            ],   [
                'AD_ID' => "BH0001 ",
                'token' => "1",
                'shopname' => " Jame's Creation",
                'category' => "1",
                'productname' => "Colorful Stylish Shirt",
                'price' => "500",
                'discount' => "20",
                'selling' => "400",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',
                'size' => '["XS","S"]',
                'collection' => '1',
                'color' => '["Black","Red","Green"]',
                'stock' => "1",
                'description' => "Lorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia no",
                'Ldescription' => "Lorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel,",
                'productimage' => "shirt.jpg",
                'created_at' => '2023-02-08 03:50:04',
                'updated_at' => '2023-02-08 03:50:12',


            ],   [
                'AD_ID' => "BH0001 ",
                'token' => "1",
                'shopname' => " Jame's Creation",
                'category' => "1",
                'productname' => "Colorful Stylish Shirt",
                'price' => "500",
                'discount' => "20",
                'selling' => "400",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',
                'size' => '["XS","S"]',
                'collection' => '1',
                'color' => '["Black","Red","Green"]',
                'stock' => "1",
                'description' => "Lorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia no",
                'Ldescription' => "Lorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel,",
                'productimage' => "shirt.jpg",
                'created_at' => '2023-02-08 03:50:03',
                'updated_at' => '2023-02-08 03:50:11',


            ],   [
                'AD_ID' => "BH0001 ",
                'token' => "1",
                'shopname' => " Jame's Creation",
                'category' => "1",
                'productname' => "Colorful Stylish Shirt",
                'price' => "500",
                'discount' => "20",
                'selling' => "400",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',
                'size' => '["XS","S"]',
                'collection' => '1',
                'color' => '["Black","Red","Green"]',
                'stock' => "1",
                'description' => "Lorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia no",
                'Ldescription' => "Lorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia nonLorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel,",
                'productimage' => "shirt.jpg",
                'created_at' => '2023-02-08 03:50:02',
                'updated_at' => '2023-02-08 03:50:10',


      ],



            // t-shirt 
            [
                'AD_ID' => "BH0001 ",
                'token' => "1",
                'shopname' => " Jame's Creation",
                'category' => "1",
                'productname' => "Stylish T-Shirt",
                'price' => "500",
                'discount' => "20",
                'selling' => "400",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',

        'size' => '["XS","S"]',
        'collection' => '2',
        'color' => '["Black","Red","Green"]',
        'stock' => "1",
        'description' => "Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam ste et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.",
        'Ldescription' => " Vero diam ea vero et dolore rebum, dolor rebum eirmod cona sed justo. Magna takimata justo et amet magna et.",
        'productimage' => "tshirt.jpg",
        'created_at' => '2023-02-08 03:50:16',
        'updated_at' => '2023-02-08 03:50:23',


            ],
            [
                'AD_ID' => "BH0001 ",
                'token' => "1",
                'shopname' => " Jame's Creation",
                'category' => "1",
                'productname' => "Stylish T-Shirt",
                'price' => "500",
                'discount' => "20",
                'selling' => "400",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',

        'size' => '["XS","S"]',
        'collection' => '2',
        'color' => '["Black","Red","Green"]',
        'stock' => "1",
        'description' => "Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam ste et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.",
        'Ldescription' => " Vero diam ea vero et dolore rebum, dolor rebum eirmod cona sed justo. Magna takimata justo et amet magna et.",
        'productimage' => "tshirt.jpg",
        'created_at' => '2023-02-08 03:50:16',
        'updated_at' => '2023-02-08 03:50:24',


            ],   [
                'AD_ID' => "BH0001 ",
                'token' => "1",
                'shopname' => " Jame's Creation",
                'category' => "1",
                'productname' => "Stylish T-Shirt",
                'price' => "500",
                'discount' => "20",
                'selling' => "400",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',

        'size' => '["XS","S"]',
        'collection' => '2',
        'color' => '["Black","Red","Green"]',
        'stock' => "1",
        'description' => "Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam ste et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.",
        'Ldescription' => " Vero diam ea vero et dolore rebum, dolor rebum eirmod cona sed justo. Magna takimata justo et amet magna et.",
        'productimage' => "tshirt.jpg",
        'created_at' => '2023-02-08 03:50:16',
        'updated_at' => '2023-02-08 03:50:25',


            ],   [
                'AD_ID' => "BH0001 ",
                'token' => "1",
                'shopname' => " Jame's Creation",
                'category' => "1",
                'productname' => "Stylish T-Shirt",
                'price' => "500",
                'discount' => "20",
                'selling' => "400",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',

        'size' => '["XS","S"]',
        'collection' => '2',
        'color' => '["Black","Red","Green"]',
        'stock' => "1",
        'description' => "Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam ste et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.",
        'Ldescription' => " Vero diam ea vero et dolore rebum, dolor rebum eirmod cona sed justo. Magna takimata justo et amet magna et.",
        'productimage' => "tshirt.jpg",
        'created_at' => '2023-02-08 03:50:16',
        'updated_at' => '2023-02-08 03:50:26',


            ],   [
                'AD_ID' => "BH0001 ",
                'token' => "1",
                'shopname' => " Jame's Creation",
                'category' => "1",
                'productname' => "Stylish T-Shirt",
                'price' => "500",
                'discount' => "20",
                'selling' => "400",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',

        'size' => '["XS","S"]',
        'collection' => '2',
        'color' => '["Black","Red","Green"]',
        'stock' => "1",
        'description' => "Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam ste et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.",
        'Ldescription' => " Vero diam ea vero et dolore rebum, dolor rebum eirmod cona sed justo. Magna takimata justo et amet magna et.",
        'productimage' => "tshirt.jpg",
        'created_at' => '2023-02-08 03:50:16',
        'updated_at' => '2023-02-08 03:50:27',


            ],   [
                'AD_ID' => "BH0001 ",
                'token' => "1",
                'shopname' => " Jame's Creation",
                'category' => "1",
                'productname' => "Stylish T-Shirt",
                'price' => "500",
                'discount' => "20",
                'selling' => "400",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',

        'size' => '["XS","S"]',
        'collection' => '2',
        'color' => '["Black","Red","Green"]',
        'stock' => "1",
        'description' => "Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam ste et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.",
        'Ldescription' => " Vero diam ea vero et dolore rebum, dolor rebum eirmod cona sed justo. Magna takimata justo et amet magna et.",
        'productimage' => "tshirt.jpg",
        'created_at' => '2023-02-08 03:50:16',
        'updated_at' => '2023-02-08 03:50:28',


      ],



            // jeans and jeggies
            [
                'AD_ID' => "BH0002 ",
                'token' => "1",
                'shopname' => " Krup's Creation",
                'category' => "2",
                'productname' => "Jeans",
                'price' => "400",
                'discount' => "20",
                'selling' => "320",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',

                'size' => '["XS","S"]',
                'collection' => '9',
                'color' => '["Black","Red","Green"]',
                'stock' => "1",
                'description' => "Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam ste et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.",
                'Ldescription' => " Vero diam ea vero et dolore rebum, dolor rebum eirmod cona sed justo. Magna takimata justo et amet magna et.",
                'productimage' => "jeans.jpg",
                'created_at' => '2023-02-08 03:50:16',
                'updated_at' => '2023-02-08 03:50:29',
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
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',

                'size' => '["XS","S"]',
                'collection' => '9',
                'color' => '["Black","Red","Green"]',
                'stock' => "1",
                'description' => "Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam ste et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.",
                'Ldescription' => " Vero diam ea vero et dolore rebum, dolor rebum eirmod cona sed justo. Magna takimata justo et amet magna et.",
                'productimage' => "jeans.jpg",
                'created_at' => '2023-02-08 03:50:16',
                'updated_at' => '2023-02-08 03:50:30',
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
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',

                'size' => '["XS","S"]',
                'collection' => '9',
                'color' => '["Black","Red","Green"]',
                'stock' => "1",
                'description' => "Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam ste et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.",
                'Ldescription' => " Vero diam ea vero et dolore rebum, dolor rebum eirmod cona sed justo. Magna takimata justo et amet magna et.",
                'productimage' => "jeans.jpg",
                'created_at' => '2023-02-08 03:50:16',
                'updated_at' => '2023-02-08 03:50:31',
            ], [
                'AD_ID' => "BH0002 ",
                'token' => "1",
                'shopname' => " Krup's Creation",
                'category' => "2",
                'productname' => "Jeans",
                'price' => "400",
                'discount' => "20",
                'selling' => "320",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',

                'size' => '["XS","S"]',
                'collection' => '9',
                'color' => '["Black","Red","Green"]',
                'stock' => "1",
                'description' => "Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam ste et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.",
                'Ldescription' => " Vero diam ea vero et dolore rebum, dolor rebum eirmod cona sed justo. Magna takimata justo et amet magna et.",
                'productimage' => "jeans.jpg",
                'created_at' => '2023-02-08 03:50:16',
                'updated_at' => '2023-02-08 03:50:32',
            ], [
                'AD_ID' => "BH0002 ",
                'token' => "1",
                'shopname' => " Krup's Creation",
                'category' => "2",
                'productname' => "Jeans",
                'price' => "400",
                'discount' => "20",
                'selling' => "320",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',

                'size' => '["XS","S"]',
                'collection' => '9',
                'color' => '["Black","Red","Green"]',
                'stock' => "1",
                'description' => "Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam ste et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.",
                'Ldescription' => " Vero diam ea vero et dolore rebum, dolor rebum eirmod cona sed justo. Magna takimata justo et amet magna et.",
                'productimage' => "jeans.jpg",
                'created_at' => '2023-02-08 03:50:16',
                'updated_at' => '2023-02-08 03:50:33',
            ], [
                'AD_ID' => "BH0002 ",
                'token' => "1",
                'shopname' => " Krup's Creation",
                'category' => "2",
                'productname' => "Jeans",
                'price' => "400",
                'discount' => "20",
                'selling' => "320",
                'age' => '["0-6(M)","6-24(M)","2-4(Y)"]',

        'size' => '["XS","S"]',
        'collection' => '9',
        'color' => '["Black","Red","Green"]',
        'stock' => "1",
        'description' => "Volup erat ipsum diam elitr rebum et dolor. Est nonumy elitr erat diam ste et justo, amet at lorem et eirmod ipsum diam et rebum kasd rebum.",
        'Ldescription' => " Vero diam ea vero et dolore rebum, dolor rebum eirmod cona sed justo. Magna takimata justo et amet magna et.",
        'productimage' => "jeans.jpg",
        'created_at' => '2023-02-08 03:50:16',
        'updated_at' => '2023-02-08 03:50:34',
      ],
    ]);
  }
}