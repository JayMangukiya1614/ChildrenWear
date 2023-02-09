<?php

namespace App\Http\Controllers;

use App\Mail\ForgetMail;
use App\Models\UserReg;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Index;
use App\Models\AddCart;
use App\Models\ProductListing;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
  public function FrontIndex()
  {
    $session = Session()->get('ULogin');
    $sessionid = User::find($session);
    if ($sessionid != null) {
      $Cart = AddCart::where([['CI_ID', '=', $sessionid->CI_ID]])->get();

      return view('Frontend.index', compact('Cart'));
    } else {
      $Cart = 0;
      return view('Frontend.index', compact(('Cart')));
    }
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

  public function FrontWishlist()
  {
    return view('Frontend.WishList');
  }

  public function FrontCart()
  {
    $session = Session()->get('ULogin');
    $sessionid = User::find($session);
    $cartitem = AddCart::where('CI_ID', $sessionid->CI_ID)->get(); // using for product details form quantity color etc

    return view('Frontend.ShoppingCart', compact('cartitem'));
  }

  public function DeleteProductCart($id)
  {
     $data = AddCart::where([['id','=',$id]])->first();
     $data->delete();

     return back()->with('DeleteItem','Item Cancel');

  }

  public function FrontCheckout()
  {

    return view('Frontend.Checkout');
  }


  public function FrontProfile()
  {

    $id = Session()->get('ULogin');
    $Edit = User::find($id);

    return view('Frontend.Profile', compact('Edit'));
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
    return redirect(route('Fprofile'))->with('Profile', 'Profile Update Successfully...');
  }


   public function FrontReg()
  {
    $session = Session()->get('ULogin');
    if ($session == NUll) {
      $Cart = 0;
      return view('Frontend.Reg', compact('Cart'));
    }
    $sessionid = User::find($session);
    $Cart = AddCart::where([['CI_ID', '=', $sessionid->CI_ID]])->get();
    return view('Frontend.Reg', compact('Cart'));
  }

  public function RegDataSave(Request $req)
  {
    $req->validate([
      'firstname' => 'required |regex:/(^[A-Za-z ]+$)+/',
      'lastname' => 'required |regex:/(^[A-Za-z ]+$)+/',
      'address' => 'required',
      'state' => 'required',
      'city' => 'required',
      'birthdate' => 'required',
      'phoneno' => 'required | regex:/^[0-9]{10}/|min:10|max:10',
      'email' => 'required |regex:/(.+)@(.+)\.(.+)/i',
      'password' => 'required | max:10| min:4 | regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',

    ]);

    $useremail = User::where([['Email', '=', $req->email]])->get()->first();

    if ($useremail) {
      return back()->with('Email', 'Email is Already Exist !!');
    } else {
      $data = new User();

      $Ci_Id = "CI" . (rand(1000, 9999));
      $CI = User::where('CI_ID', '=', $Ci_Id)->first();

      if ($CI) {
        do {
          $Ci_Id = "BH" . (rand(1000, 9999));
        } while ($Ci_Id == $CI);
      }
      $data['CI_ID'] = $Ci_Id;

      $data->FirstName = $req->firstname;
      $data->LastName = $req->lastname;
      $data->Address = $req->address;
      $data->State = $req->state;
      $data->City = $req->city;
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
      'password' => 'required | max:10| min:4 | regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',


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
      return redirect(route('Findex'))->with('Logout', 'Logout Successfullhy.....');
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

    $req->validate([

      'currentpass' => 'required | max:10| min:4 | regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
      'newpass' => 'required | max:10| min:4 | regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
      'confirmpass' => 'required | max:10| min:4 | regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',

    ]);

    $id = Session()->get('ULogin');
    $data = User::find($id);
    $session = Session()->get('ULogin');
    $sessionid = User::find($session);
    $Cart = AddCart::where([['CI_ID', '=', $sessionid->CI_ID]])->get();

    if (Hash::Check($req->currentpass, $data->Password)) {
      // dd($req->currentpass);
      if ($req->newpass == $req->confirmpass) {
        $data->Password = Hash::make($req->newpass);
        $data->update();
        return redirect(route('Fprofile'))->with('PasswordUpdate', 'Password Updated Successfully..');
      } else {
        return back()->with('NewPswdNMatch', 'New and Confirm Password not matched!!');
      }
    } else {

      return back()->with('CurrentPswdNMatch', 'Current Password not matched!!');
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
    if ($data != null) {
      $mail = $data->Email;
      $details = [];
      $req->Session()->put('F-Password', $data->id);
      Mail::to($mail)->send(new ForgetMail($details));
      return back()->with('Check', 'Email Sent Successfully.. Please Check Your Email Box');
    } else {
      return back()->with('Not', 'This Email Id is Not Avvailable On Database');
    }
  }

  public function ForgetPasswordSave(Request $req)
  {

    $id = Session()->get('F-Password');

   $data = User::find($id);

    if ($req->newpass == $req->confirmpass) {
      $data->Password = Hash::make($req->newpass);
      $data->update();
      return redirect(route('Flogin'))->with('Forget-Password-Update', 'Password Update Successfully....');
    } else {
      return back()->with('NewPswdNMatch', 'New and Confirm Password not match');
    }
  }
}

    if ($req->newpass == $req->confirmpass) {
      $data->Password = Hash::make($req->newpass);
      $data->update();
      return redirect(route('Flogin'))->with('Forget-Password-Update', 'Password Update Successfully....');
    } else {
      return back()->with('NewPswdNMatch', 'New and Confirm Password not match');
    }
  }
}
