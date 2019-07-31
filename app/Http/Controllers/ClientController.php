<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalogue;
use App\TypeCatalog;
use App\Client;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ClientRequest;
use Validator;

class ClientController extends Controller
{

    public function index()
    {
        return datatables()->of(Client::all()->where('state','ACTIVO'))
        ->addColumn('catalog_zone_id', function ($item) {
            $catalog_zone_id = Catalogue::find($item->catalog_zone_id);
            return  $catalog_zone_id->name;
        })
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
        $rule = new ClientRequest();        
        $validator = Validator::make($request->all(), $rule->rules());
        if ($validator->fails())
        {
            return response()->json(['success'=>false,'msg'=>$validator->errors()->all()]);
        } 
        else{
            Client::create($request->all());
            return response()->json(['success'=>true,'msg'=>'Registro existoso.']);
        }
    }
    public function show($id)
    {
        $Client = Client::find($id);
        return $Client->toJson();
    }

    public function edit(Request $request)
    {
        $Client = Client::find($request->id);
        return $Client->toJson();
    }

    public function update(Request $request)
    {
        $rule = new ClientRequest();        
        $validator = Validator::make($request->all(), $rule->rules());
        if ($validator->fails())
        {
            return response()->json(['success'=>false,'msg'=>$validator->errors()->all()]);
        } 
        else{
            $Client = Client::find($request->id);
            $Client->update($request->all());
            return response()->json(['success'=>true,'msg'=>'Se actualizo existosamente.']);
        }
    }

    public function destroy(Request $request)
    {
        $Client = Client::find($request->id);
        $Client->delete();
        return response()->json(['success'=>true,'msg'=>'Registro borrado.']);
    }
    
    // Return Views
    public function client()
    {
        return view('manage_sales.client');
    }
}
