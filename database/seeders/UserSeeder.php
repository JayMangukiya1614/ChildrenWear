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
                'Name' => "Admin",
                'Email' => "babyhub007@gmail.com",
                'Password' => Hash::make('BH@123'),
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
                'mobilenumber' => "1234567891",
                'gstno' => "08AAGFF2194N1Z1",
                'bankname' => "YES BANK",
                'branchname' => "VARACHA",
                'ifsccode' => "YESB0000400",
                'email' => "babyhub007@gmail.com",
                'password' => Hash::make('BH@123'),
                'address' => "Admin",
                'message' => "I hope you  you are accepet my account request",

            ],


        ]);

        DB::table('users')->insert([
            [
                'CI_ID' => "CI0001",
                'FirstName' => "Admin ",
                'LastName' => " Admin",
                'Address' => "110 ishvarnagar soc-2 Sitanagr road surat",
                'State' => "Gujrat",
                'City' => "Surat",
                'BirthDate' => "04-01-2003",
                'PhoneNo' => "1234567890",
                'Gender' => "Male",
                'Email' => "babyhub007@gmail.com",
                'Password' => Hash::make('BH@123'),
                'ZipCode' => "395010",
            ]


        ]);

    DB::table('product_listings')->insert([
      // shirt
      [
        'AD_ID' => "BH0001 ",
        'token' => "1",
        'PI_ID' => "P-0001",
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
        'PI_ID' => "P-0002",
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
        'PI_ID' => "P-0003",
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
        'PI_ID' => "P-0004",
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
        'PI_ID' => "P-0005",
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
        'PI_ID' => "P-0006",
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
        'PI_ID' => "P-0007",
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
        'PI_ID' => "P-0008",
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
        'PI_ID' => "P-0009",
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
        'PI_ID' => "P-0010",
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
        'PI_ID' => "P-0011",
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
        'PI_ID' => "P-0012",
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

        ]);

        
        DB::table('add_carts')->insert([
            [
                'CI_ID' => "CI0001",
                'product_id' => "P-0005",
                'AD_ID' => "BH0001",

                'age' => " 0-6(M)",
                'color' => "Black",
                'size' => "XS",
                'quantity' => "1",
                'created_at' => '2023-02-25 04:24:20',
                'updated_at' => '2023-02-25 04:24:20',
            ],
            [
                'CI_ID' => "CI0001",
                'product_id' => "P-0002",
                'AD_ID' => "BH0001",

                'age' => " 0-6(M)",
                'color' => "Black",
                'size' => "XS",
                'quantity' => "2",
                'created_at' => '2023-02-25 04:24:38',
                'updated_at' => '2023-02-25 04:24:42',
            ]


        ]);
    }
}
