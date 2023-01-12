<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminreg;
use App\Models\Mainadmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class MainAdminController extends Controller
{
    public function Mlogin()
    {
        return view('MainAdmin.Mlogin');
    }
    public function Mlogindata(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',

        ]);
       $data = DB::table('mainadmins')->where([['Email','=',$request->email]])->get()->first();
        if($data)
        {
            if(Hash::check($request->password,$data->Password))
            {
                $request->Session()->put('Mlogin',$data->id);
                return redirect(route('main-admin-read'))->with('LoginSuccess',"Login Successfully......!");

            }
            else
            {
                return back()->with('Password', 'Password not matched');

            }
        }
        else
        {
            return back()->with('E_mail', 'Email not matched');

        }
    }
    public function Madminlogout()
    {
        if (Session()->has('Mlogin')) {
            Session()->pull('Mlogin');
            return redirect(route('Mlogin'))->with('Logout' , 'Logout Successfullhy.....');
        } else {
            return "Please log-in account";
        }
    }
    public function read()
    {
        $id = Session()->get('Mlogin');
        $name = Mainadmin::find($id);
        $data = DB::table('adminregs')->where([['token','=',0]])->get();
        // $data = Adminreg::all();
        return view('MainAdmin.read',compact('data','name'));
    }
    public function MshowAdmin($id)
    {
        $data = Adminreg::find($id);
        return view('MainAdmin.Request',compact('data'));
    }
    public function acceptrequest($id)
    {
        // return $id;
        $data  =  Adminreg::find($id);
        $data->token = 1;
        // $data->profileimage = $imagename;

        $data->save();
       
        return redirect(route('main-admin-read'))->with('Accept',"Accepted Successfully.....!");
    }
    public function acceptedrequestshow()
    {
        $data = DB::table('adminregs')->where([['token','=',1]])->get();
        return view('MainAdmin.acceptrequest',compact('data'));
    }
    public function cancelrequest( $id)
    {

        $data  =  Adminreg::find($id);
         $data->token = 2;
        $data->save();

        return redirect(route('main-admin-read'))->with('Delete',"Deleted Successfully.....!");

    }
    public function deleterequestshow()
    {
        $data = DB::table('adminregs')->where([['token','=',2]])->get();
        return view('MainAdmin.deleterequest',compact('data'));
    }
}
