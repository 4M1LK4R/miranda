<?php

namespace App\Http\Controllers;
use App\Payment;
use App\User;
use App\Client;
use App\Seller;
use App\Collector;
use App\Catalogue;
use App\Sale;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return datatables()->of(Payment::all())
        ->addColumn('collector_name', function ($item) {
            $collector_name = Collector::find($item->collector_id);
            return  $collector_name->name;
        })
        ->addColumn('sale_id', function ($item) {
            $sale_id = Sale::find($item->sale_id);
            return  $sale_id->id;
        })
        ->addColumn('Eliminar', function ($item) {
            return '<a class="btn btn-xs btn-danger text-white circle" onclick="Delete('.$item->id.')"><i class="icon-ok-circled"></i></a>';
        })
        ->rawColumns(['Eliminar'])                     
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
    public function charges()
    {
        return view('collections.charges');
    }
}
