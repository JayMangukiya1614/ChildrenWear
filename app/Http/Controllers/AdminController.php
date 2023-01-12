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

        
        $data = DB::table('adminregs')->where([['email', '=', $request->email]])->get()->first();
        if ($data) {
            // if ($data->token == 1) {
                dd (Hash::check($request->password,$data->password));
                // {
                //     return"work";
                //     $request->Session()->put('Alogin', $data->id);
                //     return redirect(route('dashboard'))->with('LoginSuccess', "Login Successfully......!");
                // } else {
                //     return back()->with('Password', 'Password not matched');
                // }
            // } elseif ($data->token == 0) {

            //     return back()->with('Token0', 'Your Request Has Been Pending....!');
            // } elseif ($data->token == 2) {


            //     return back()->with('Token2', 'Your Request Has Been Deleted....!');
            // }
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

        $req->validate([
            'profileimage' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'middlename' => 'required',
            'education' => 'required',
            'gender' => 'required',
            'country' => 'required',
            'city' => 'required',
            'mobilenumber' => 'required',
            'gstno' => 'required',
            'bankname' => 'required',
            'branchname' => 'required',
            'ifsccode' => 'required',
            'email' => 'required',
            'password' => 'required',
            'address' => 'required',
        ]);


        $image = $req->profileimage;
        $imagename = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imagename);

        $data  = new Adminreg();
        $data->token = 0;
        $data->profileimage = $imagename;
        $data->firstname = $req->firstname;
        $data->lastname = $req->lastname;
        $data->middlename = $req->middlename;
        $data->education = $req->education;
        $data->gender = $req->gender;
        $data->country = $req->country;
        $data->city = $req->city;
        $data->mobilenumber = $req->mobilenumber;
        $data->gstno = $req->gstno;
        $data->bankname = $req->bankname;
        $data->branchname = $req->branchname;
        $data->ifsccode = $req->ifsccode;
        $data->email = $req->email;
        $data->password = Hash::make('$req->password;');
        $data->address = $req->address;
        $data->message = $req->message;

        $data->save();

        return back()->with("message", 'Your Request Has Been Pending');
    }
}