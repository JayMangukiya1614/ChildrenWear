<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\AddCart;
use Illuminate\Http\Request;
use App\Models\ProductListing;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\AddressRequest;
use App\Models\AddressBook;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Subscribe;
use GrahamCampbell\ResultType\Success;
use Illuminate\Contracts\Session\Session;


class DropDownController extends Controller
{
    public function Products(Request $req, $id)
    {
        // return $req->all();
        $data = ProductListing::where('collection', $id)->where('token',1)->get();
        $latest = ProductListing::where('collection', $id)->where('token',1)->get()->first();
        $search = $req['search'] ?? "";
        if ($search != "") {
            $data = ProductListing::where('productname', 'LIKE', "%$search%")->where('collection', $id)->where('token',1)->get();
            return view('Frontend.Shop', compact('data', 'search', 'latest'));
        }

        return view('Frontend.Shop', compact('data', 'latest'));
    }
    public function Latest_Product($id)
    {

        $data = ProductListing::where([['collection', $id]])->orderBy('updated_at', 'desc')->paginate(8);
        $latest = ProductListing::where([['collection', $id]])->get()->first();
        return view('Frontend.Shop', compact('data', 'latest'));
    }
    public function Product_Detail($id)
    {

        $data = ProductListing::where('id', $id)->get()->first();
        return view('Frontend.ShopDetails', compact('data'));
    }

    public function Product_Cart(CartRequest $req, $id)
    {

        $Add_Cart = $req->validated();
        $sessionid = Session()->get('ULogin');
        $details = User::find($sessionid);
        $Add_Cart['CI_ID'] = $details->CI_ID;
        $admin_id = ProductListing::where('id', $id)->first();
        $Add_Cart['product_id'] = $admin_id->PI_ID;
        $Add_Cart['AD_ID'] = $admin_id->AD_ID;


        AddCart::create($Add_Cart);

        return redirect(route('Fcart'));
    }
    public function quantityadd($id)
    {
        // return $id;
        $data = AddCart::find($id);
        $data->quantity = $data->quantity + 1;
        $data->update();
        return back()->with('Quantity', 'Quantity Added Successfullu...');
    }
    public function quantityminus($id)
    {
        // return $id;
        $data = AddCart::find($id);
        $data->quantity = $data->quantity - 1;
        if($data->quantity == 0)
        {
         return back()->with('error', 'You Are Not Minus For Quantity...');
        }
        $data->update();
        return back()->with('Quantity', 'Quantity Minus Successfullu...');
    }

    public function DeleteProductCart($id)
    {
        $data = AddCart::where([['id', '=', $id]])->first();
        $data->delete();

        return back()->with('DeleteItem', 'Item Cancel');
    }
    public function AddressSave(AddressRequest $req, $id)
    {
        $data = $req->validated();

        User::whereId($id)->update($data);

        return  redirect(route('Confirm-Order'));
    }

    public function ConfirmOrder()
    {

        $id = Session()->get('ULogin');
        $data = User::find($id);

        $findorder = AddCart::where('CI_ID', $data->CI_ID)->get();


        foreach ($findorder as  $findorder) {
            $OI_ID = "OI-" . (rand(1000, 9999));
            $OI = Order::where('OI_ID', '=', $OI_ID)->first();

            if ($OI) {
                do {
                    $OI_ID = "BH" . (rand(1000, 9999));
                } while ($OI_ID == $OI);
            }
            $Order = new order();
            $Order->OI_ID = $OI_ID;
            $Order->token = 0;
            $Order->CI_ID = $findorder->CI_ID;
            $Order->product_id = $findorder->product_id;
            $Order->AD_ID = $findorder->AD_ID;
            $Order->age = $findorder->age;
            $Order->color = $findorder->color;
            $Order->size = $findorder->size;
            $Order->quantity = $findorder->quantity;
            $t = time();
            $Order->date = (date("Y-m-d", $t));
            $Order->is_set = 0;
            $Order->save();
        }

        return redirect(route('OrderTable'))->with('Confirm', 'Your Order Has Been Pendding');
    }
    public function OrderTable()
    {

        $sessionid = Session()->get('ULogin');
        $name = User::find($sessionid);
        $addcart = AddCart::where('CI_ID', $name->CI_ID)->get();
        foreach ($addcart as $addcart) {
            $addcart = Addcart::find($addcart->id);
            $addcart->delete();
        }
        $data = Order::where('CI_ID', $name->CI_ID)->where('token', 0)->orderBy('updated_at', 'desc')->get();
        return view('Frontend.OrderTable.POrderTable', compact('data','name'));
    }
    public function clientOrderDetails($id)
    {
      $orderdata = Order::find($id);
      $productdata = ProductListing::where('PI_ID',$orderdata->product_id)->first();
      
    return response()->json(['success' => true, 'orderdata' => $orderdata , 'productdata' => $productdata ]);
      
        // return view('Frontend.OrderTable.POrderDetails', compact('data'));
    }
    public function COrderTable()
    {
        $sessionid = Session()->get('ULogin');
        $name = User::find($sessionid);
        $data = Order::where('CI_ID', $name->CI_ID)->where('token', 1)->orderBy('updated_at', 'desc')->get();
        return view('Frontend.OrderTable.COrderTable', compact('data','name'));
    }
    public function DOrderTable()
    {
        $sessionid = Session()->get('ULogin');
        $name = User::find($sessionid);
        $data = Order::where('CI_ID', $name->CI_ID)->where('token', 2)->orderBy('updated_at', 'desc')->get();
        return view('Frontend.OrderTable.DOrderTable', compact('data','name'));
    }
    public function DeleteOrderTable()
    {
        $sessionid = Session()->get('ULogin');
        $name = User::find($sessionid);
        $data = Order::where('CI_ID', $name->CI_ID)->where('token', 3)->orderBy('updated_at', 'desc')->get();

        return view('Frontend.OrderTable.DeleteOrderTable', compact('data','name'));
    }

    public function OrderDelete($id)
    {
        $data = Order::find($id);
        $data->token = 3;
        $data->update();
        return back()->with('info', 'Order Deleted Successfully');
    }
    public function Subscribe(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required',


        ]);
        $id = Session()->get('ULogin');
        $sessionid = User::find($id);
        $data = Subscribe::where('email', $req->email)->first();
        if ($data) {
            return back()->with('info', 'Thank You For Once Again But You Are Already Subscribe Our Website');
        } elseif ($sessionid->Email == $req->email) {
            $data = new Subscribe();
            $data->name = $req->name;
            $data->email = $req->email;
            $data->save();
            return back()->with('success', 'Thank You For Subscribe Our Website');
        } else {
            return back()->with('error', 'Sorry For Your Email Does Not Match');
        }
    }
    public function Contact(Request $req)
    {

        $req->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $id = Session()->get('ULogin');
        $sessionid = User::find($id);

        if ($sessionid->Email != $req->email) {
            return back()->with('error', 'Email Does Not Matches..');
        } else {
            $data = new Contact();
            $data->name = $req->name;
            $data->CI_ID =  $sessionid->CI_ID;
            $data->token = 0;
            $data->email = $req->email;
            $data->subject = $req->subject;
            $data->message = $req->message;
            $data->save();
            return back()->with('info', 'Your Querie Successfully Send..');
        }
        return $req->all();
    }
}