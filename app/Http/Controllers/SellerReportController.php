<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Client;
use App\Seller;
use App\DetailSaleProduct;
use App\Batch;
use App\Catalogue;
use App\Sale;
use App\Product;
use App\Payment;

use Yajra\DataTables\DataTables;

class SellerReportController extends Controller
{

    public function SelleReport(Request $request)
    {
        
        return datatables()->of(Sale::all()->where('payment_status_id', 5)->where('seller_id',$request->seller_id)->whereBetween('date',[$request->minimum_date, $request->maximum_date]))
        ->addColumn('client_name', function ($item) {
            $client_name = Client::find($item->client_id);
            return  $client_name->name;
        })
        ->addColumn('zone_name', function ($item) {
            $client = Client::find($item->client_id);
            //$zone_name = Catalogue::where('catalog_zone_id',3)->where('id',$client->catalog_zone_id);
            $zone_name=Catalogue::where('id',$client->catalog_zone_id)->pluck('name')->first();
            return  $zone_name;
        })
        ->addColumn('seller_name', function ($item) {
            $seller_name = Seller::find($item->seller_id);
            return  $seller_name->name;
        })          
        ->toJson();
    }

    public function ReportLines(Request $request)
    {
        return datatables()->of(Batch::all()->where('state','ACTIVO')->where('line_id',$request->line_id))
        ->addColumn('product_name', function ($item) {
            $product_name = Product::find($item->product_id);
            return  $product_name->name;
        })      
        ->toJson();
    }


    public function ReportCollectors(Request $request)
    {
        $sale = Sale::find($request->sale_id);
        return datatables()->of(Payment::all()->where('state', 'ACTIVO')->where(6,$sale->payment_status_id)->whereBetween('date',[$request->minimum_date, $request->maximum_date]))
        ->addColumn('client_name', function ($item) {
            $client_name = Client::find($item->client_id);
            return  $client_name->name;
        })          
        ->toJson();
    }

    public function sellerreport()
    {
        return view('report.sellerreport');
    }
    public function reportline()
    {
        return view('report.reportline');
    }
    public function reportcollector()
    {
        return view('report.reportcollector');
    }
}
