<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminreg;
use App\Models\Mainadmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Mail\RequestMail;
use App\Mail\DRequestMail;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\ProductListing;
use App\Models\Order;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

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
        return redirect(route('MDashboard'))->with('success', "Login Successfully......!");
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
    $data = Order::select('id')->get()->count();
    $pen = Order::where('token', 0)->get()->count();
    $pending = (($pen * 100) / $data);
    $pending = round($pending, 2);
    $con = Order::where('token', 1)->get()->count();
    $confirem = (($con * 100) / $data);
    $confirem = round($confirem, 2);
    $del = Order::where('token', 3)->get()->count();
    $delet = (($del * 100) / $data);
    $delet = round($delet, 2);

    return view('MainAdmin.MDashboard', compact('confirem', 'data', 'pending', 'delet'));
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
    // return $id;
    $data  =  Adminreg::find($id);

    $product = ProductListing::where('AD_ID', $data->AD_ID)->get();
    foreach ($product as $product) {
      $product->token = 3;
      $product->save();
    }
    Session()->pull('Alogin');
    $mail = $data->email;
    $data->token = 2;
    $details = [
      'title' => 'Welcome To our Website',
      'body'  => 'this is for testing mail using mail'
    ];

    Mail::to($mail)->send(new DRequestMail($details));

    $data->save();

    return redirect(route('delete-request-show'))->with('error', " Account Deleted Successfully.....!");
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
  public function Queries()
  {

    $data = Contact::where('token', 0)->get();
    return view('MainAdmin.Client_Queries', compact('data'));
  }
  public function Reply_Queries(Request $req, $id)
  {
    // return "work";
    $req->validate([
      'reply' => 'required',
    ]);
    $contact = Contact::find($id);
    $contact->token = 1;
    $contact->update();
    $mail = $contact->email;

    $details = [
      'subject' => $contact->subject,
      'message' => $contact->message,
      'reply' => $req->reply,

    ];

    Mail::to($mail)->send(new ContactMail($details));
    return back()->with('info', 'Message Sent Successfully.');
  }
  public function MainAdminProductDetails($id)
  {
    $data = ProductListing::find($id);
    return response()->json(['success' => true, 'data' => $data]);
    // return view('MainAdmin.ProductDetail', compact('data'));
  }
}