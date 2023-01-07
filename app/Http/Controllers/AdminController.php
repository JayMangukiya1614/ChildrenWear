<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Adminreg;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminLogin()
    {
        return view('admin.login')->with('LogOut', 'LogOut Successfully....!');
    }

    public function AdminProfile()
    {
        return view('admin.Profile');
    }
    public function AdminReg()
    {
        return view('admin.Registeration');
    }

<<<<<<< HEAD
    public function AdminRegSave(Request $req)
    {
        return "work";
        $data = $req ->validated();
        $image = $req->profileimage;
        $imagename = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imagename);
        $data['profileimage'] = $imagename;
        Adminreg::create($data);
=======
>>>>>>> 080fd0bd3ef42012fc7c9bcf5378242f4446edfd

    public function AdminRegSave(Request $req)
    {
   
     
        $image = $req->file('file');
        $imagename = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imagename);

        $data  = new Adminreg();
        $data->firstname = $req->firstname;
        $data->profileimage = $imagename;

        $data->save();
       
        return back()->with("message", 'Your Request Has Been Pending');


       
    }
}