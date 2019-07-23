<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// importados
use App\Provider;
use App\Catalogue;
use App\TypeCatalog;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProviderRequest;

class ProviderController extends Controller
{
    public function index()
    {
        return datatables()->of(Provider::all()->where('state','ACTIVO'))
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
    public function store(ProviderRequest $request)
    {
        $Provider = Provider::create($request->all());
        return response()->json(['success'=>true,'msg'=>'Registro existoso.']);
    }
    public function show($id)
    {
        $Provider = Provider::find($id);
        return $Provider->toJson();
    }
    public function edit(Request $request)
    {
        $Provider = Provider::find($request->id);
        return $Provider->toJson();
    }

  
    public function update(ProviderRequest $request)
    {
        $Provider = Provider::find($request->id);
        $Provider->update($request->all());
        return response()->json(['success'=>true,'msg'=>'Se actualizo existosamente.']);
    }


    public function destroy(Request $request)
    {
        $Provider = Provider::find($request->id);
        $Provider->delete();
        return response()->json(['success'=>true,'msg'=>'Registro borrado.']);
    }

    public function listprovider(Request $request)
    {
        switch ($request->by)
        {
            case 'all':
                $list=Provider::All();
                return $list=Provider::All();
            break;         
            default:
            break;
        }
    }

    // Return Views
    public function provider()
    {
        return view('manage_inventory.provider');
    }
}
