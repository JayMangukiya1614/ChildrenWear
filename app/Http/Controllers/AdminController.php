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

    public function AdminRegSave(AdminRequest $req)
    {
        return "work";
        $data = $req ->validated();
        $image = $req->profileimage;
        $imagename = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imagename);
        $data['profileimage'] = $imagename;
        Adminreg::create($data);

        return back()->with("message", 'Student  Recored Has Been Created');
    }
}