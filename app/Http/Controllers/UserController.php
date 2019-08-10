<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Validator;

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
            ->addColumn('Editar', function ($item) {
                return '<a class="btn btn-xs btn-primary text-white" onclick="Edit('.$item->id.')"><i class="icon-pencil"></i></a>';
            })
            ->addColumn('Eliminar', function ($item) {
                return '<a class="btn btn-xs btn-danger text-white" onclick="Delete(\''.$item->id.'\')"><i class="icon-trash"></i></a>';
            })
            ->rawColumns(['Editar','Eliminar'])              
            ->toJson();
        }
        else{
            return datatables()->of(User::all()->where('state','!=','ELIMINADO')->where('name','!=','bytemo'))
            ->addColumn('Editar', function ($item) {
                return '<a class="btn btn-xs btn-primary text-white disabled" onclick="Edit('.$item->id.')"><i class="icon-pencil"></i></a>';
            })
            ->addColumn('Eliminar', function ($item) {
                return '<a class="btn btn-xs btn-danger text-white disabled" onclick="Delete(\''.$item->id.'\')"><i class="icon-trash"></i></a>';
            })
            ->rawColumns(['Editar','Eliminar'])              
            ->toJson();
        }
    }
    public function store(Request $request)
    {
        $rule = new UserRequest();        
        $validator = Validator::make($request->all(), $rule->rules());
        if ($validator->fails())
        {
            return response()->json(['success'=>false,'msg'=>$validator->errors()->all()]);
        } 
        else{
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'state' => $request->state,
                'password' => bcrypt($request->password),
            ]);
            //User::create($request->all());
            return response()->json(['success'=>true,'msg'=>'Registro existoso.']);
        }
    }
    public function edit(Request $request)
    {
        $User = User::find($request->id);
        return $User->toJson();
    }
    public function update(Request $request)
    {
        $rule = new UserUpdateRequest();        
        $validator = Validator::make($request->all(), $rule->rules());
        if ($validator->fails())
        {
            return response()->json(['success'=>false,'msg'=>$validator->errors()->all()]);
        } 
        else{
            $User = User::find($request->id);
            $User->update($request->all());
            return response()->json(['success'=>true,'msg'=>'Se actualizo existosamente.']);
        }
    }
    public function destroy(Request $request)
    {
        $User = User::find($request->id);
        $User->delete();
        return response()->json(['success'=>true,'msg'=>'Registro borrado.']);
    }
    public function user()
    {
        return view ('configuration.user');
    }
}
