<?php

namespace App\Http\Controllers;

use App\Models\UserReg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class FrontendController extends Controller
{
  public function FrontIndex()
  {
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
      'firstname' => 'required',
      'lastname' => 'required',
      'address' => 'required',
      'birthdate' => 'required',
      'phoneno' => 'required',
      'email' => 'required',
      'password' => 'required',

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
    $CheckLogin = DB::table('users')->where([['Email', '=', $req->email]])->get()->first();

    if ($CheckLogin) {
      if (Hash::check($req->password, $CheckLogin->Password)) {
        $req->Session()->put('ULogin', $CheckLogin->id);
        return view('Frontend.index');
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
    $id = Session()->get('ULogin');
    $data = User::find($id);
    if (Hash::Check($req->currentpass, $data->Password)) {
      if ($req->newpass == $req->confirmpass) {
        $data->Password = Hash::make($req->newpass);
        $data->save();
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
    return view('Frontend.ForgetPassword');
  }


}