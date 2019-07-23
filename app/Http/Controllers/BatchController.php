<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalogue;
use App\Product;
use App\Client;
use App\Provider;
use App\User;
use App\Batch;
use Yajra\DataTables\DataTables;
use App\Http\Requests\BatchRequest;

class BatchController extends Controller
{
    
    public function index()
    {
        return datatables()->of(Batch::all()->where('state','ACTIVO'))
        ->addColumn('product_id', function ($item) {
            $product_id = Product::find($item->product_id);
            return  $product_id->name;
        })
        ->addColumn('Detalle', function ($item) {
            return '<a class="btn btn-xs btn-success text-white" onclick="Show('.$item->id.')"><i class="icon-list-bullet"></i></a>';
        })
        ->addColumn('Editar', function ($item) {
            return '<a class="btn btn-xs btn-primary text-white" onclick="Edit('.$item->id.')"><i class="icon-pencil"></i></a>';
        })
        ->addColumn('Eliminar', function ($item) {
            return '<a class="btn btn-xs btn-danger text-white" onclick="Delete(\''.$item->id.'\')"><i class="icon-trash"></i></a>';
        })
        ->rawColumns(['Detalle','Editar','Eliminar']) 
              
        ->toJson();
    }
    public function store(BatchRequest $request)
    {
        $Product = Batch::create($request->all());
        return response()->json(['success'=>true,'msg'=>'Registro existoso.']);
    }
    public function show(Request $request)
    {
        $Batch = Batch::find($request->id);
        //return $Batch->toJson();
        //json_encode(unserialize(serialize($array)));

        //return compact($Batch);
        //['user' => auth()->user()]
        return compact(Batch);

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
    public function batch()
    {
        return view('manage_inventory.batch');
    }
}
