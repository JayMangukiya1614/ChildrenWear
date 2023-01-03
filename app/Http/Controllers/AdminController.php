<?php

namespace App\Http\Controllers;
use App\Http\Requests\AdminRequest;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminLogin()
    {
        return view('admin.login')->with('LogOut','LogOut Successfully....!');
    }

    public function AdminProfile()
    {
        return view('admin.Profile');
    }
    public function AdminReg()
    {
        return view('admin.Registeration');
    }

    public function AdminRegSave(AdminRequest $request)
    {
        return "work";
        $data = $request->validated();
        // return "abc";
        return back() ->with('Request_Pending','Your Request Has Been Pendding...');
    }
}
