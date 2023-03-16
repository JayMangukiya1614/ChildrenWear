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
use App\Models\Order;
use Illuminate\Contracts\Session\Session;


class DropDownController extends Controller
{
    public function Products($id)
    {

        $data = ProductListing::where([['collection', $id]])->paginate(6);
        // $pagination = ProductListing::paginate(6);
        $latest = ProductListing::where([['collection', $id]])->get()->first();

        return view('Frontend.Shop', compact('data', 'latest'));
    }
    public function Latest_Product($id)
    {

        $data = ProductListing::where([['collection', $id]])->orderBy('updated_at', 'desc')->paginate(6);
        $pagination = ProductListing::paginate(6);
        $latest = ProductListing::where([['collection', $id]])->get()->first();


        // return $data;
        return view('Frontend.Shop', compact('data', 'latest', 'pagination'));
    }
    public function Product_Detail($id)
    {

        $data = ProductListing::where([['id', '=', $id]])->get()->first();
        return view('Frontend.ShopDetails', compact('data'));
    }

    public function Product_Cart(CartRequest $req, $id)
    {

        $Add_Cart = $req->validated();
        $sessionid = Session()->get('ULogin');
        $details = User::find($sessionid);
        $data = AddCart::where([['product_id', '=', $id]])->first();


        $Add_Cart['CI_ID'] = $details->CI_ID;
        $Add_Cart['product_id'] = $id;
        $admin_id = ProductListing::where('id', $id)->first();
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
        return $data = $req->validated();

        User::whereId($id)->update($data);

        return  back()->with('info', 'Address Updates Successffully...');
    }
    public function ConfirmOrder()
    {
        $id = Session()->get('ULogin');
        $data = User::find($id);

        $findorder = AddCart::where('CI_ID', $data->CI_ID)->get();


        foreach ($findorder as  $findorder) {
            // uniqe order id 
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

            $Order->save();
        }

        return redirect(route('OrderTable'))->with('Confirm', 'Your Order Has Been Pendding');
    }
    public function OrderTable()
    {

        $sessionid = Session()->get('ULogin');
        $name = User::find($sessionid);
        $addcart = AddCart::where('CI_ID',$name->CI_ID)->get();
                 foreach($addcart as $addcart)
                 {
                    $addcart = Addcart::find($addcart->id);
                    $addcart->delete();
                 }
        $data = Order::where('CI_ID', $name->CI_ID)->where('token', 0)->orderBy('updated_at', 'desc')->get();
        return view('Frontend.OrderTable.POrderTable', compact('data'));
    }
    public function COrderTable()
    {
        $sessionid = Session()->get('ULogin');
        $name = User::find($sessionid);
        $data = Order::where('CI_ID', $name->CI_ID)->where('token', 1)->orderBy('updated_at', 'desc')->get();
        return view('Frontend.OrderTable.COrderTable', compact('data'));
    }
    public function DOrderTable()
    {
        $sessionid = Session()->get('ULogin');
        $name = User::find($sessionid);
        $data = Order::where('CI_ID', $name->CI_ID)->where('token', 2)->orderBy('updated_at', 'desc')->get();
        return view('Frontend.OrderTable.DOrderTable', compact('data'));
    }
    public function DeleteOrderTable()
    {
        $sessionid = Session()->get('ULogin');
        $name = User::find($sessionid);
        $data = Order::where('CI_ID', $name->CI_ID)->where('token', 3)->orderBy('updated_at', 'desc')->get();

        return view('Frontend.OrderTable.DeleteOrderTable', compact('data'));
    }

    public function OrderDelete($id)
    {
        $data = Order::find($id);
        $data->token = 3;
        $data->update();
        return back()->with('error', 'Order Deleted Successfully');
    }
}

// $id = Session()->get('ULogin');
//         $sessionname = User::find($id);
//           $name = AddCart::where('CI_ID',$sessionname->CI_ID)->get();
//         //  foreach($name as $name)
//         //  {
//         //     $addcart = Addcart::find($name->id);
//         //     $addcart->delete();
//         //  }
//         return $data = Order::where('CI_ID', $name->CI_ID)->where('token', 0)->orderBy('updated_at', 'desc')->get();
//         return view('Frontend.OrderTable', compact('data'));