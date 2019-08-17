<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Client;
use App\Seller;
use App\DetailSaleProduct;

use App\Catalogue;
use App\Sale;

use Yajra\DataTables\DataTables;

class SellerReportController extends Controller
{

    public function SelleReport(Request $request)
    {
        return $Sale = Sale::all();
       /* $Sales=Sale::where('payment_status_id', 5)->where('seller_id',$request->seller_id)->whereBetween('date',[$request->minimum_date, $request->maximum_date])->get();
        return datatables()->of($Sales);*/
    }
    
    public function sellerreport()
    {
        return view('report.sellerreport');
    }
}
