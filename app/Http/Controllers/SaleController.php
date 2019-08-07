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
        //
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
