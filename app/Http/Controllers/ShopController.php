<?php

namespace App\Http\Controllers;


use App\Catalogue;
use App\Product;
use App\Client;
use App\Provider;
use App\User;
use App\Batch;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;

class ShopController extends Controller
{

    public function index()
    {
        return datatables()->of(Batch::all()->where('stock','>',0))
        ->addColumn('product_name', function ($item) {
            $product = Product::find($item->product_id);
            return  $product->name;
        })
        ->addColumn('Detalle', function ($item) {
            return '<a class="btn btn-xs btn-success text-white" onclick="Detail('.$item->id.')"><i class="icon-list-bullet"></i></a>';
        })
        ->addColumn('Shop', function ($item) {
            $product = Product::find($item->product_id);
            return '<a class="btn btn-xs btn-success text-white" onclick="Shop('.$item->id.',\''.$product->name.'\')"><i class="icon-cart-plus"></i></a>';
        })
        ->rawColumns(['Detalle','Shop']) 
              
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

    public function shop()
    {
        return view('shop.shop');
    }
}
