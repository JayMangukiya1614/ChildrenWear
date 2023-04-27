<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Http\Requests\AdminProfileRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Adminreg;
use App\Models\ProductListing;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UProductRequest;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdminForgetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

  public function Aforgetpassword()
  {
    return view('admin.Forget_Password.Forget-Password');
  }

  public function Aforgetemail()
  {
    return view('admin.Forget_Password.Forget-Email');
  }

  public function Aforgetemailsend(Request $req)
  {
    $req->validate([
      'email' => 'required',
    ]);

    $data = Adminreg::where('email', '=', $req->email)->first();
    if ($data != null) {
      $mail = $data->email;
      $details = [];
      $req->Session()->put('A-F-Password', $data->id);
      Mail::to($mail)->send(new AdminForgetPasswordMail($details));
      return back()->with('Check', 'Email Sent Successfully.. Please Check Your Email Box');
    } else {
      return back()->with('Not', 'This Email Id is Not Avvailable On Database');
    }
  }

  public function Aforgetpasswordsave(Request $req)
  {

    $req->validate([
      'newpass' => 'required | max:10| min:4 ',
      'confirmpass' => 'required | max:10| min:4',

    ]);
    $id = Session()->get('A-F-Password');


    $data = Adminreg::find($id);

    if ($req->newpass == $req->confirmpass) {
      $data->password = Hash::make($req->confirmpass);
      $data->update();
      Session()->pull('A-F-Password');
      return redirect(route('Admin-Login'))->with('Forget-Password-Update', 'Password Update Successfully....');
    } else {
      return back()->with('NewPswdNMatch', 'New and Confirm Password not match');
    }
  }

  public function Achangepassword()
  {
    return view('admin.Change-Password');
  }

  public function Achangepasswordsave(Request $req)
  {

    $req->validate([

      'currentpass' => 'required',
      'newpass' => 'required',
      'confirmpass' => 'required',

    ]);

    $id = Session()->get('Alogin');
    $data = Adminreg::find($id);
    $session = Session()->get('Alogin');
    $sessionid = Adminreg::find($session);
    // $Cart = AddCart::where([['CI_ID', '=', $sessionid->CI_ID]])->get();

    if (Hash::Check($req->currentpass, $data->password)) {
      // dd($req->currentpass);
      if ($req->newpass == $req->confirmpass) {
        $data->password = Hash::make($req->newpass);
        $data->update();
        return redirect(route('dashboard-analytics'))->with('success', 'Password Updated Successfully..');
      } else {
        return back()->with('error', 'New and Confirm Password not matched!!');
      }
    } else {

      return back()->with('error', 'Current Password not matched!!');
    }
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
          $check = Session()->get('Alogin');
          if ($check == null) {
            $request->Session()->put('Alogin', $data->id);
            return redirect(route('dashboard-analytics'))->with('LoginSuccess', "Login Successfully......!");
          }
          return redirect(route('dashboard-analytics'))->with('error', 'You Have Already Login');
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
    $id = Session()->get('Alogin');
    $data = Adminreg::find($id);
    return view('admin.Profile', compact('data'));
  }

  public function AdminProfileSave(AdminProfileRequest $req, $id)
  {
    $data = $req->validated();
    if ($req->profileimage != null) {
      $imagename = time() . '.' . $data['profileimage']->extension();
      $data['profileimage']->move(public_path('images'), $imagename);
      $data['profileimage'] = $imagename;
      Adminreg::whereId($id)->update($data);

      return back()->with('Update', 'Profile Upated Successfully...');
    }

    Adminreg::whereId($id)->update($data);
    return back()->with('Update', 'Profile Upated Successfully...');
  }
  public function AdminReg()
  {
    return view('admin.Registeration');
  }

  public function AdminRegSave(AdminRequest $req)
  {
    $data = $req->validated();
    $Ad_Id = "BH" . (rand(1000, 9999));
    $AD = Adminreg::where('AD_ID', '=', $Ad_Id)->first();

    if ($AD) {
      do {
        $Ad_Id = "BH" . (rand(1000, 9999));
      } while ($Ad_Id == $AD);
    }
    $data['AD_ID'] = $Ad_Id;
    $data['token'] = 0;
    $data['password'] = Hash::make($data['password']);
    if ($req->profileimage != null) {
      $imagename = time() . '.' . $data['profileimage']->extension();
      $data['profileimage']->move(public_path('images'), $imagename);
      $data['profileimage'] = $imagename;
    }
    $email = Adminreg::where('email', $data['email'])->first();
    $gstno = Adminreg::where('gstno', $data['gstno'])->first();
    if ($gstno) {

      if ($gstno->token == 1) {

        return back()->with("Request", 'This Gst umber Is Already Working Account');
      } elseif ($gstno->token == 0) {
        return back()->with("Request", 'This Gst Number Is Already Pending Account');
      }
    }

    if ($email) {

      if ($email->token == 1) {

        return back()->with("Request", ' Email Id Is Already Taken');
      } elseif ($email->token == 0) {
        return back()->with("Request", 'Your Request Has alredy Pending');
      }
    }
    Adminreg::create($data);

    return redirect(route('Admin-Login'))->with("success", 'Register Successfully. Your Request Has Been Pending');
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

  public function AdminProductListing()
  {
    $id = Session()->get('Alogin');
    $sessionid = Adminreg::find($id);
    return view('admin.listing', compact('sessionid'));
  }

  public function AdminProductSave(ProductRequest $req)
  {
    $data = $req->validated();
    $Pi_Id = "P-" . (rand(1000, 9999));
    $PI = ProductListing::where('PI_ID', '=', $Pi_Id)->first();

    if ($PI) {
      do {
        $Pi_Id = "P-" . (rand(1000, 9999));
      } while ($Pi_Id == $PI);
    }
    $data['token'] = 1;
    $data['PI_ID'] = $Pi_Id;
    $id = Session()->get('Alogin');
    $check = Adminreg::find($id);
    if ($check->AD_ID == $req->AD_ID) {
      $sell = ($data['price'] * $data['discount']) / 100;
      $data['selling'] = round($data['price'] - $sell, 2);
      $data['age']  = json_encode($req->age);
      $data['size']  = json_encode($req->size);
      $data['color']  = json_encode($req->color);
      $imagename = time() . '.' . $data['productimage']->extension();
      $data['productimage']->move(public_path('ProductImages'), $imagename);
      $data['productimage'] = $imagename;
      if (str_word_count($data['description']) > 500) {
        return back()->with('Description', 'Your Description is Long.. Maximum Use 450 Word');
      }
      if (str_word_count($data['Ldescription']) > 900) {
        return back()->with('LDescription', 'Your Long Description is Also Long.. Maximum Use  900 Word');
      }

      ProductListing::create($data);

      return redirect(route('Admin-Product-table'))->with('Success', "Product Entry SuccessFull...");
    } else {
      return back()->with('Id', 'Please Enter A Valid Id');
    }
  }

  public function AdminProductTable(Request $Req)
  {
    // return $req->all();
    $id = Session()->get('Alogin');
    $check = Adminreg::find($id);
    $heading = Adminreg::where([['AD_ID', $check->AD_ID]])->first();

    $data = ProductListing::where([['AD_ID', $check->AD_ID]])->orderBy('updated_at', 'desc')->get();

    $search = $Req['search'] ?? "";
    if ($search != "") {
      $data = ProductListing::where([['PI_ID', 'LIKE', "%$search%"]])->where('AD_ID', $check->AD_ID)->get();
      return view('admin.Product-table', compact('data', 'heading', 'search'));
    }
    // $searching = $search;
    return view('admin.Product-table', compact('data', 'heading', 'search'))->with('error','Data Not Found');
  }

  public function AdminProductDeleteTable()
  {
    $id = Session()->get('Alogin');
    $check = Adminreg::find($id);
    $heading = Adminreg::where([['AD_ID', $check->AD_ID]])->first();

    $data = ProductListing::where([['AD_ID', $check->AD_ID]])->orderBy('updated_at', 'desc')->get();


    return view('admin.Delete-Product-table', compact('data', 'heading'));
  }

  public function AdminProductListingShow($id)
  {
    $data = ProductListing::find($id);
    return view('admin.listing-update', compact('data'));
  }
  public function AdminProductListingdelete($id)

  {
    $data = ProductListing::where('id', $id)->orderBy('updated_at', 'desc')->first();
    $data->token = 2;
    $data->save();
    return redirect(route('Admin-Product-table'))->with('Success', "Product Deleted SuccessFull...");
  }

  public function AdminProductListingUpdate(UProductRequest  $req, $id)
  {
    $data = $req->validated();
    $sell = ($data['price'] * $data['discount']) / 100;
    $data['selling'] = round($data['price'] - $sell, 2);
    $data['token']  = 1;
    $data['age']  = json_encode($req->age);
    $data['size']  = json_encode($req->size);
    $data['color']  = json_encode($req->color);
    if ($req->productimage != NULL) {
      $imagename = time() . '.' . $data['productimage']->extension();
      $data['productimage']->move(public_path('ProductImages'), $imagename);
      $data['productimage'] = $imagename;
    }
    // if (str_word_count($data['description']) > 500) {
    //   return back()->with('Description', 'Your Description is Long.. Maximum Use 500 Word');
    // }
    // // return $des;
    // if ((str_word_count($data['Ldescription']) > 20)&& (str_word_count($data['Ldescription']) < 1000)) {
    //   return back()->with('LDescription', 'Your Long Description is Also Long.. Maximum Use  1000 Word');
    // }
    ProductListing::whereId($id)->update($data);

    return  redirect(route('Admin-Product-table'))->with('Update', " Product Updated Succesfully....!!");
  }
}
