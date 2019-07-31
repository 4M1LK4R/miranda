<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            Sale::create($request->all());
            return response()->json(['success'=>true,'msg'=>'Registro existoso.']);
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
            $Provider = Provider::find($request->id);
            $Provider->update($request->all());
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
