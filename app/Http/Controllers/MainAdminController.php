<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminreg;
use App\Models\Mainadmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\RequestMail;
use App\Mail\DRequestMail;
use App\Models\ProductListing;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

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
        $data = DB::table('mainadmins')->where([['Email', '=', $request->email]])->get()->first();
        if ($data) {
            if (Hash::check($request->password, $data->Password)) {
                $request->Session()->put('Mlogin', $data->id);
                return redirect(route('MDashboard'))->with('LoginSuccess', "Login Successfully......!");
            } else {
                return back()->with('Password', 'Password not matched');
            }
        } else {
            return back()->with('E_mail', 'Email not matched');
        }
    }
    public function Madminlogout()
    {
        if (Session()->has('Mlogin')) {
            Session()->pull('Mlogin');
            return redirect(route('Mlogin'))->with('Logout', 'Logout Successfullhy.....');
        } else {
            return "Please log-in account";
        }
    }
    public function MDashboard()
    {
        $post = DB::table('orders')->get('*')->toArray();
        foreach ($post as $post) {
          $date = Order::where('date', $post->date)->get();
            $a = count($date);

            $data[] = array(
                'label' => $post->date,
                'y' => $a,
            );
        }
        // return $data;
        return view('MainAdmin.MDashboard', ['data' => $data]);
    }
    public function chartdate(Request $req)
    {
        // $post = DB::table('orders')->get('*')->toArray();
        $date = Order::where('date', $req->date)->get();
        $a = count($date);

        $data[] = array(
            'label' => $req->date,
            'y' => $a,
        );

        // return $data;
        return view('MainAdmin.MDashboard', ['data' => $data]);
    }
    public function read()
    {
        $data = DB::table('adminregs')->where([['token', '=', 0]])->get();
        return view('MainAdmin.read', compact('data'));
    }
    public function MshowAdmin($id)
    {
        $data = Adminreg::find($id);
        return view('MainAdmin.Request', compact('data'));
    }
    public function acceptrequest($id)
    {
        $data  =  Adminreg::find($id);
        $data->token = 1;
        $mail = $data->email;

        $details = [

            'AD_ID' => $data->AD_ID
        ];

        Mail::to($mail)->send(new RequestMail($details));


        $data->save();

        return redirect(route('main-admin-read'))->with('Accept', "Accepted Successfully.....!");
    }
    public function acceptedrequestshow()
    {
        $data = DB::table('adminregs')->where([['token', '=', 1]])->get();

        return view('MainAdmin.acceptrequest', compact('data'));
    }

    public function MshowAccepetform($id)
    {
        $data = Adminreg::find($id);
        return view('MainAdmin.acceptrequestform', compact('data'));
    }
    public function cancelrequest(Request $request, $id)
    {

        $data  =  Adminreg::find($id);
        $mail = $data->email;
        $data->token = 2;
        $details = [
            'title' => 'Welcome To our Website',
            'body'  => 'this is for testing mail using mail'
        ];

        Mail::to($mail)->send(new DRequestMail($details));
        //  return "Email sent ";
        $data->save();

        return redirect(route('main-admin-read'))->with('Delete', "Deleted Successfully.....!");
    }
    public function deleterequestshow()
    {
        $data = DB::table('adminregs')->where([['token', '=', 2]])->get();
        return view('MainAdmin.deleterequest', compact('data'));
    }

    public function MshowDeleteform($id)
    {
        $data = Adminreg::find($id);
        return view('MainAdmin.deleterequestform', compact('data'));
    }
}
