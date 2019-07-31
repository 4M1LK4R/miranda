<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\SellerRequest;
use Validator;

class SellerController extends Controller
{
    
    public function index()
    {
        return datatables()->of(Seller::all()->where('state','ACTIVO'))
        ->addColumn('Editar', function ($item) {
            return '<a class="btn btn-xs btn-primary text-white" onclick="Edit('.$item->id.')"><i class="icon-pencil"></i></a>';
        })
        ->addColumn('Eliminar', function ($item) {
            return '<a class="btn btn-xs btn-danger text-white" onclick="Delete(\''.$item->id.'\')"><i class="icon-trash"></i></a>';
        })
        ->rawColumns(['Editar','Eliminar']) 
              
        ->toJson();
    }
    public function store(Request $request)
    {  
        $rule = new SellerRequest();        
        $validator = Validator::make($request->all(), $rule->rules());
        if ($validator->fails())
        {
            return response()->json(['success'=>false,'msg'=>$validator->errors()->all()]);
        } 
        else{
            Seller::create($request->all());
            return response()->json(['success'=>true,'msg'=>'Registro existoso.']);
        }
    }
    public function show($id)
    {
        $Seller = Seller::find($id);
        return $Seller->toJson();
    }

    public function edit(Request $request)
    {
        $Seller = Seller::find($request->id);
        return $Seller->toJson();
    }

    public function update(Request $request)
    {
        $rule = new SellerRequest();        
        $validator = Validator::make($request->all(), $rule->rules());
        if ($validator->fails())
        {
            return response()->json(['success'=>false,'msg'=>$validator->errors()->all()]);
        } 
        else{
            $Seller = Seller::find($request->id);
            $Seller->update($request->all());
            return response()->json(['success'=>true,'msg'=>'Se actualizo existosamente.']);
        }
    }

    public function destroy(Request $request)
    {
        $Seller = Seller::find($request->id);
        $Seller->delete();
        return response()->json(['success'=>true,'msg'=>'Registro borrado.']);
    }

    public function seller()
    {
        return view('manage_sales.seller');
    }
}
