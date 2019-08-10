<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\User;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user')->only('user'); 
    }
    public function index()
    {
        $isUser = auth()->user()->can(['user.edit', 'user.destroy']);
        if ($isUser) {
            return datatables()->of(User::all()->where('state','!=','ELIMINADO')->where('name','!=','bytemo'))
            ->addColumn('Detalle', function ($item) {
                return '<a class="btn btn-xs btn-primary text-white" onclick="Show('.$item->id.')"><i class="icon-list-bullet"></i></a>';
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
        else{
            return datatables()->of(User::all()->where('state','!=','ELIMINADO')->where('name','!=','bytemo'))
            ->addColumn('Detalle', function ($item) {
                return '<a class="btn btn-xs btn-primary text-white disabled" onclick="Show('.$item->id.')"><i class="icon-list-bullet"></i></a>';
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
    public function user()
    {
        return view ('configuration.user');
    }
}
