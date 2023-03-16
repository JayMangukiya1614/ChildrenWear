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
        $data = Order::where('AD_ID', $Admin->AD_ID)->where('token', 0)->get();

        return view('admin.ClientPOrder', compact('data'));
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
        $data = Order::where('AD_ID', $session->AD_ID)->where('token', 3)->get();
        return view('admin.ClientOrderShow', compact('data'));
    }
    public function pdf($id)
    {

        $data = Order::where('OI_ID', $id)->first();
        $client = User::where('CI_ID', $data->CI_ID)->first();
        $Ci_Id = "CI" . (rand(1000, 9999));
        $CI = User::where('CI_ID', '=', $Ci_Id)->first();
  
        if ($CI) {
          do {
            $Ci_Id = "BH" . (rand(1000, 9999));
          } while ($Ci_Id == $CI);
        }
        $pdf = PDF::loadview('pdf.invoice', compact('data', 'client'));
        return $pdf->download('invoice.pdf');


    }

    // public function downloadPDF()
    // {

    //     $data= Order::where('OI_ID',$id)->get();
    //     $pdf = PDF::loadview('pdf.invoice',compact('data'));
    //     return $pdf->download('employees.pdf');
    // }
}
