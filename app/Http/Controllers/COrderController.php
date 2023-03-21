<?php

namespace App\Http\Controllers;

use App\Models\AddCart;
use App\Models\Adminreg;
use App\Models\Order;
use App\Models\ProductListing;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class COrderController extends Controller
{
    public function ClientPOrder()
    {
        $token = 0;
        $id  = Session()->get('Alogin');
        $Admin = Adminreg::find($id);
        //  $Corder = Order::all();
        // $heading = Order::where('AD_ID', $Admin->AD_ID)->where('token', 0)->first();

        $data = Order::where('AD_ID', $Admin->AD_ID)->where('token', 0)->get();

        return view('admin.ClientPOrder', compact('data', 'Admin'));
    }
    public function AdminOrderAccepet($id)
    {

        $data = Order::find($id);
        $data->token = 1;
        $data->update();

        return back()->with('info', 'Order Accepted Successfully...');
    }

    public function ClientOrderShow()
    {
        $id = Session()->get('Alogin');
        $session = Adminreg::find($id);
        $data = Order::where('AD_ID', $session->AD_ID)->where('token', 1)->orderBy('date', 'desc')->where('is_set', 0)->get();
        return view('admin.ClientOrderShow', compact('data', 'session'));
    }
    public function pdf($id)
    {

        $data = Order::where('OI_ID', $id)->first();
        $client = User::where('CI_ID', $data->CI_ID)->first();
        $data->is_set  = 1;
        $data->update();
        $pdf = PDF::loadview('pdf.invoice', compact('data', 'client'));
        return $pdf->download('invoice.pdf');
    }

    public function ClientBillList(Request $req)
    {
        $id = Session()->get('Alogin');
        $session = Adminreg::find($id);
        $data = Order::where('AD_ID', $session->AD_ID)->where('date', $req->date)->where('token', 1)->get();
        $date = $req->date;
        return view('admin.ClientBillList',compact('data','session','date'));
   

    }
    public function dashboard()
    {
        return view('content.dashboard.dashboards-analytics');

    }
}
