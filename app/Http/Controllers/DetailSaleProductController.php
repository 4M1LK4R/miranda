<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Batch;
use App\DetailSaleProduct;
use Illuminate\Http\Request;
use App\Http\Requests\DetailSaleProductRequest;
use Validator;


class DetailSaleProductController extends Controller
{
    public function store(Request $request)
    {
        $rule = new DetailSaleProductRequest();        
        $validator = Validator::make($request->all(), $rule->rules());
        if ($validator->fails())
        {
            return response()->json(['success'=>false,'msg'=>$validator->errors()->all()]);
        } 
        else{
            $DetailSaleProduct = DetailSaleProduct::create($request->all());
            //Actualizando Stock de Batch (Lote)
            $Batch = Batch::find($DetailSaleProduct->batch_id);
            $Batch->stock = $Batch->stock - $DetailSaleProduct->amount;
            $Batch->save();
            return response()->json(['success'=>true,'msg'=>'Registro existoso.']);
        }
    }
    public function show(Request $request)
    {
        $Detail = DetailSaleProduct::find($request->id)->first();

        $Sale = Sale::find($Detail->sale_id)->with('client','payment_status','seller')->first();
        $Detail->Sale = $Sale;

        $Batch = Batch::find($Detail->batch_id)->with('product','user','provider','line','storage','industry','payment_status','payment_type')->first();
        $Detail->Batch = $Batch;

        return $Detail;
    }
    public function details_of_sale(Request $request)
    {
        $Details = DetailSaleProduct::all()->where('sale_id',$request->id);
        return $Details;
    }
}
