<?php

namespace App\Http\Controllers;
use App\Payment;
use App\User;
use App\Client;
use App\Seller;
use App\Collector;
use App\Catalogue;
use App\Sale;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\PaymentRequest;
use Validator;

class PaymentController extends Controller
{
    public function index()
    {
        return datatables()->of(Sale::all()->where('payment_status_id',5))
        ->addColumn('client_name', function ($item) {
            $client_name = Client::find($item->client_id);
            return  $client_name->name;
        })
        ->addColumn('SelectSale', function ($item) {
            return '<a class="btn btn-xs btn-success text-white circle" onclick="SelectSale('.$item->id.')"><i class="icon-ok-circled"></i></a>';
        })
        ->rawColumns(['SelectSale'])                     
        ->toJson();
    }
    public function store(Request $request)
    {
        $rule = new PaymentRequest();        
        $validator = Validator::make($request->all(), $rule->rules());
        if ($validator->fails())
        {
            return response()->json(['success'=>false,'msg'=>$validator->errors()->all()]);
        } 
        else{
            Payment::create($request->all());
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
        $Sale = Sale::find($request->id);
        if($Sale){
            $Sale->receive = $request->receive;
            $Sale->save();
        }
    }
    public function destroy($id)
    {
        //
    }
    public function payment()
    {
        return view('collections.payment');
    }

    

}
