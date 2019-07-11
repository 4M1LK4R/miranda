<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// importados
use App\TypeCatalogue;
use App\Catalogue;
use Yajra\DataTables\DataTables;
use App\Http\Requests\CatalogueRequest;


class CatalogueController extends Controller
{

    public function index(Request $request)
    {
        return datatables()->of(Catalogue::all()->where('type_catalog_id', $request->type_catalog_id)->where('state','ACTIVO'))
        ->addColumn('Editar', function ($item) {
            return '<a class="btn btn-xs btn-primary text-white" onclick="Edit('.$item->id.')"><i class="icon-pencil"></i></a>';
        })
        ->addColumn('Eliminar', function ($item) {
            return '<a class="btn btn-xs btn-danger text-white" onclick="Delete(\''.$item->id.'\')"><i class="icon-trash"></i></a>';
        })
        ->rawColumns(['Editar','Eliminar']) 
              
        ->toJson();
    }
    public function store(CatalogueRequest $request)
    {
        $Catalogue = Catalogue::create($request->all());
        return response()->json(['success'=>true,'msg'=>'Registro existoso.']);
    }
    public function show($id)
    {
        $Catalogue = Catalogue::find($id);
        return $Catalogue->toJson();
    }
    public function edit(Request $request)
    {
       $Catalogue = Catalogue::find($request->id);
        return $Catalogue->toJson();
    }
    public function update(CatalogueRequest $request)
    {
        $Catalogue = Catalogue::find($request->id);
        $Catalogue->update($request->all());
        return response()->json(['success'=>true,'msg'=>'Se actualizo existosamente.']);
    }

    public function destroy(Request $request)
    {
        $Catalogue = Catalogue::find($request->id);
        $Catalogue->delete();
        return response()->json(['success'=>true,'msg'=>'Registro borrado.']);
    }

    // Return Views
    public function line() // linea
    {
        return view('catalogs.line');
    }
    public function depot() // almacen
    {
        
    }
    public function product_type() // tipo de producto
    {
        
    }
    public function department() // departamento
    {

    }

}
