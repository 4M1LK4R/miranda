<?php

namespace App\Http\Controllers;
use App\Payment;


use App\User;
use App\Client;
use App\Seller;

use App\Catalogue;
use App\Sale;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Validator;

class PaymentController extends Controller
{
    public function index()
    {
        return datatables()->of(Sale::all()->where('payment_status_id',6))
        ->addColumn('client_name', function ($item) {
            $client_name = Client::find($item->client_id);
            return  $client_name->name;
        })
        ->addColumn('Agregar', function ($item) {
            return '<a class="btn btn-xs btn-success text-white" onclick="AddSale('.$item->id.')"><i class="icon-ok-circled"></i></a>';
        })

        ->rawColumns(['Agregar'])            
        ->toJson();
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function payment()
    {
        return view('collections.payment');
    }
    

}
