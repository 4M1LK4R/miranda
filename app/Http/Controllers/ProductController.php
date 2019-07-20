<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Catalogue;
use App\TypeCatalog;
use App\Product;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        return datatables()->of(Product::all()->where('state','ACTIVO'))
        ->addColumn('id_catalog_product', function ($item) {
            $id_catalog_product = Catalogue::find($item->id_catalog_product);
            return  $id_catalog_product->name;
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
    public function store(ProductRequest $request)
    {
        $Product = Product::create($request->all());
        return response()->json(['success'=>true,'msg'=>'Registro existoso.']);
    }
    public function show($id)
    {
        $Product = Product::find($id);
        return $Product->toJson();
    }

    public function edit(Request $request)
    {
        $Product = Product::find($request->id);
        return $Product->toJson();
    }
    public function update(ProductRequest $request)
    {
        $Product = Product::find($request->id);
        $Product->update($request->all());
        return response()->json(['success'=>true,'msg'=>'Se actualizo existosamente.']);
    }
    public function destroy(Request $request)
    {
        $Product = Product::find($request->id);
        $Product->delete();
        return response()->json(['success'=>true,'msg'=>'Registro borrado.']);
    }

    public function listproduct(Request $request)
    {
        switch ($request->by)
        {
            case 'all':
                $list=Product::All();
                return $list=Product::All();
            break;         
            default:
            break;
        }
    }

    // Return Views
    public function product()
    {
        return view('manage_inventory.product');
    }
}
