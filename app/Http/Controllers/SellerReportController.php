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
    
    public function sellerreport()
    {
        return view('report.sellerreport');
    }
}
