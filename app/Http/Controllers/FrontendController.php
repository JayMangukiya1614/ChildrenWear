<?php

namespace App\Http\Controllers;

use App\Mail\ForgetMail;
use App\Models\UserReg;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Index;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
  public function FrontIndex()
  {
    // $data = Index::all();
    // return view('Frontend.index', compact('data'));
    return view('Frontend.index');

  }

  public function FrontShopDetails()
  {
    return view('Frontend.ShopDetails');
  }

  public function FrontShop()
  {
    return view('Frontend.Shop');
  }

  public function FrontContact()
  {
    return view('Frontend.Contact');
  }

  public function FrontCart()
  {
    return view('Frontend.ShoppingCart');
  }

  public function FrontCheckout()
  {
    return view('Frontend.Checkout');
  }

  public function FrontReg()
  {
    return view('Frontend.Reg');
  }

  // public function RegDataSave(Request $req)
  // {

  //   // $req->validate([

  //   //   'FirstName' => 'required',
  //   //   'LastName' => 'required',
  //   //   'Address' => 'required',
  //   //   'BirthDate' => 'required',
  //   //   'PhoneNo' => 'required',
  //   //   'Gender' => 'required',
  //   //   'Email' => 'required',
  //   //   'Password' => 'required',

  //   // ]);

  //   $data = new User();

  //   $data->FirstName = $req->firstname;
  //   $data->LastName = $req->lastname;
  //   $data->Address = $req->address;
  //   $data->BirthDate = $req->birthdate;
  //   $data->PhoneNo = $req->phoneno;
  //   $data->Gender = $req->gender;
  //   $data->Email = $req->email;
  //   $data->Password = Hash::make($req->password);

  //   $data->save();

  //   return redirect(route('Flogin'));
  // }

  public function FrontProfile()
  {
    $id = Session()->get('ULogin');
    $Profile['Edit'] = User::find($id);
    return view('Frontend.Profile', $Profile);
  }

  public function FProfileUpdateSave(Request $Req, $id)
  {
    $Req->validate([
      'firstname' => 'required',
      'lastname' => 'required',
      'address' => 'required',
      'phoneno' => 'required | regex:/^[0-9]{10}/|min:10|max:10'


    ]);
    $data = User::find($id);
    $data->FirstName =  $Req->firstname;
    $data->LastName =  $Req->lastname;
    $data->Address =  $Req->address;
    $data->PhoneNo =  $Req->phoneno;

    $data->save();
    return redirect(route('Fprofile'));
  }

  public function RegDataSave(Request $req)
  {
    $req->validate([
      'firstname' =>'required |regex:/(^[A-Za-z ]+$)+/',
      'lastname' => 'required |regex:/(^[A-Za-z ]+$)+/',
      'address' => 'required',
      'birthdate' => 'required',
      'phoneno' => 'required | regex:/^[0-9]{10}/|min:10|max:10',
      'email' => 'required |regex:/(.+)@(.+)\.(.+)/i',
      'password' => 'required | max:8 | min:4',

    ]);


    $useremail = User::where([['Email', '=', $req->email]])->get()->first();

    if ($useremail) {
      return back()->with('Email', 'Email is Already Exist !!');
    } else {
      $data = new User();

      $data->FirstName = $req->firstname;
      $data->LastName = $req->lastname;
      $data->Address = $req->address;
      $data->BirthDate = $req->birthdate;
      $data->PhoneNo = $req->phoneno;
      $data->Gender = $req->gender;
      $data->Email = $req->email;
      $data->Password = Hash::make($req->password);

      $data->save();

      return redirect(route('Flogin'))->with('Reg', 'Registration successfully...');
    }
  }

  public function FrontLogin()
  {
    return view('Frontend.Login');
  }

  public function CheckLogin(Request $req)
  {
    $req->validate([

      'email' => 'required |regex:/(.+)@(.+)\.(.+)/i',
      'password' => 'required | max:8 | min:4',

    ]);


    $CheckLogin = DB::table('users')->where([['Email', '=', $req->email]])->get()->first();

    if ($CheckLogin) {
      if (Hash::check($req->password, $CheckLogin->Password)) {
        $req->Session()->put('ULogin', $CheckLogin->id);
        return redirect(route('Findex'))->with('LoginSuccess', "Login Successfully......!");
      } else {
        return back()->with('Password', 'Password is not matched');
      }
    } else {
      return back()->with('Email', 'Email is not matched');
    }
  }

  public function FLogout()
  {
    if (Session()->has('ULogin')) {
      Session()->pull('ULogin');
      return redirect(route('Flogin'))->with('Logout', 'Logout Successfullhy.....');
    } else {
      return "Please log-in account";
    }
  }

  //Change Password
  public function FPassword()
  {
    return view('Frontend.ChangePassword');
  }

  public function FChangePassword(Request $req)
  {

    // $req->validate([

    //   'currentpassword' => 'required | max:8| min:4',
    //   'newpassword' => 'required | max:8 | min:4',
    //   'confirmpassword' => 'required | max:8 | min:4',

    // ]);

    $id = Session()->get('ULogin');
    $data = User::find($id);
    if (Hash::Check($req->currentpass, $data->Password)) {
      // dd($req->currentpass);
      if ($req->newpass == $req->confirmpass) {
        $data->Password = Hash::make($req->newpass);
        $data->update();
        return redirect('Fprofile');
      } else {
        return back()->with('NewPswdNMatch', 'New and Confirm Password not match');
      }
    } else {
      return back()->with('CurrentPswdNMatch', 'Current Password not match');
    }
  }

  //forget password
  public function FForgetPassword()
  {
    return view('Frontend.Forget-Password.ForgetPassword');
  }
  public function ForgetPEmail()
  {
    return view('Frontend.Forget-Password.Forget-Email');

  }

  public function ForgetPEmailSend(Request $req)
  {

    $data = User::where('Email', '=', $req->email)->first();
    if($data != null)
    {
      $mail = $data->Email;
      $details = [];
    $req->Session()->put('F-Password', $data->id);
    Mail::to($mail)->send(new ForgetMail( $details));
    return back()->with('Check','Email Sent Successfully.. Please Check Your Email Box');
    }
    else{
      return back()->with('Not','This Email Id is Not Avvailable On Database');
    }

  }

  public function ForgetPasswordSave(Request $req){

    $id = Session()->get('F-Password');
     $data = User::find($id);

      if ($req->newpass == $req->confirmpass) {
        $data->Password = Hash::make($req->newpass);
        $data->update();
        return redirect(route('Flogin'))->with('Forget-Password-Update','Password Update Successfully....');
      } else {
        return back()->with('NewPswdNMatch', 'New and Confirm Password not match');
      }

  }
}
