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
        $Sales=Sale::where('payment_status_id', 5)->where('seller_id',$request->seller_id)->whereBetween('date',[$request->minimum_date, $request->maximum_date])->get();
        return datatables()->of($Sales)
        ->addColumn('client_name', function ($item) {
            $client_name = Client::find($item->client_id);
            return  $client_name->name;
        })
        ->addColumn('seller_name', function ($item) {
            $seller_name = Seller::find($item->seller_id);
            return  $seller_name->name;
        })          
        ->toJson();
    }
    
    public function sellerreport()
    {
        return view('report.sellerreport');
    }
}
