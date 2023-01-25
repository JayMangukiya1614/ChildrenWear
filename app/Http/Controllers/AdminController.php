<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Adminreg;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('content.dashboard.dashboards-analytics');
    }
    public function AdminLogin()
    {
        return view('admin.login')->with('LogOut', 'LogOut Successfully....!');
    }
    public function Alogindata(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);

        $data = DB::table('adminregs')->where([['email', '=', $request->email]])->get()->first();
        if ($data) {

            if ($data->token == 1) {
                if (Hash::check($request->password, $data->password)) {

                    $request->Session()->put('Alogin', $data->id);
                    return redirect(route('dashboard'))->with('LoginSuccess', "Login Successfully......!");
                } else {
                    return back()->with('Password', 'Password not matched');
                }
            } elseif ($data->token == 0) {

                return back()->with('Token0', 'Your Request Has Been Pending....!');
            } elseif ($data->token == 2) {


                return back()->with('Token2', 'Your Request Has Been Deleted....!');
            }
        } else {
            return back()->with('E_mail', 'Email not matched');
        }
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
        // return "work";

        $data = $req->validated();

        $data['token'] = 0;
        $data['password'] = Hash::make($data['password']);

        if ($req->profileimage != null) {
            $imagename = time() . '.' . $data['profileimage']->extension();
            $data['profileimage']->move(public_path('images'), $imagename);
        }
        Adminreg::create($data);

        return back()->with("message", 'Your Request Has Been Pending');
    }
    public function Adminlogout()
    {
        if (Session()->has('Alogin')) {
            Session()->pull('Alogin');
            return redirect(route('Admin-Login'))->with('Logout', 'Logout Successfullhy.....');
        } else {
            return "Please log-in account";
        }
    }
}
