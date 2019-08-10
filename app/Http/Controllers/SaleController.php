<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Catalogue;
use App\Batch;
use App\User;
use App\Client;
use App\Seller;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Http\Requests\SaleRequest;
use Validator;

class SaleController extends Controller
{
    public function index()
    {
        /*
            ID
            USER
            CLIENTE
            VENDEDOR
            FECHA
            TOTAL
            ESTADO DE PAGO
            ESTADO

            DESCUENTO
            EXPORACIÓN DESCUENTO
            TOTAL CON DESCUENTO
        */



        $isUser = auth()->user()->can(['batch.edit', 'batch.destroy']);
        if($isUser){
            return datatables()->of(Batch::all()->where('state','!=','ELIMINADO'))
            ->addColumn('product_name', function ($item) {
                $product_name = Product::find($item->product_id);
                return  $product_name->name;
            })
            ->addColumn('Detalle', function ($item) {
                return '<a class="btn btn-xs btn-success text-white" onclick="Detail('.$item->id.')"><i class="icon-list-bullet"></i></a>';
            })
            ->addColumn('Editar', function ($item) {
                return '<a class="btn btn-xs btn-primary text-white" onclick="Edit('.$item->id.')"><i class="icon-pencil"></i></a>';
            })
            ->addColumn('Eliminar', function ($item) {
                return '<a class="btn btn-xs btn-danger text-white" onclick="Delete(\''.$item->id.'\')"><i class="icon-trash"></i></a>';
            })
            ->rawColumns(['Detalle','Editar','Eliminar'])            
            ->toJson();
        }else{
            return datatables()->of(Batch::all()->where('state','ACTIVO'))
            ->addColumn('product_name', function ($item) {
                $product_name = Product::find($item->product_id);
                return  $product_name->name;
            })
            ->addColumn('Detalle', function ($item) {
                return '<a class="btn btn-xs btn-success text-white" onclick="Detail('.$item->id.')"><i class="icon-list-bullet"></i></a>';
            })
            ->addColumn('Editar', function ($item) {
                return '<a class="btn btn-xs btn-primary text-white disabled" onclick="Edit('.$item->id.')"><i class="icon-pencil"></i></a>';
            })
            ->addColumn('Eliminar', function ($item) {
                return '<a class="btn btn-xs btn-danger text-white disabled" onclick="Delete(\''.$item->id.'\')"><i class="icon-trash"></i></a>';
            })
            ->rawColumns(['Detalle','Editar','Eliminar'])            
            ->toJson();
        }
        
    }
    public function create()
    {

    }
    public function store(Request $request)
    {
        $rule = new SaleRequest();        
        $validator = Validator::make($request->all(), $rule->rules());
        if ($validator->fails())
        {
            return response()->json(['success'=>false,'msg'=>$validator->errors()->all()]);
        } 
        else{
            $Sale = Sale::create($request->all());
            return response()->json(['success'=>true,'msg'=>'Registro existoso.','sale_id'=>$Sale->id]);
        }
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
        $rule = new SaleRequest();        
        $validator = Validator::make($request->all(), $rule->rules());
        if ($validator->fails())
        {
            return response()->json(['success'=>false,'msg'=>$validator->errors()->all()]);
        } 
        else{
            $Sale = Sale::find($request->id);
            $Sale->update($request->all());
            return response()->json(['success'=>true,'msg'=>'Se actualizo existosamente.']);
        }
    }
    public function destroy($id)
    {
        //
    }
    public function sale()
    {
        return view('sale.sale');
    }
}
