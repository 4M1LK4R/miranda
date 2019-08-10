<?php

namespace App\Http\Controllers;
use App\Payment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class PaymentController extends Controller
{
    public function index()
    {
        //
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
    public function payment()
    {
        return view('collections.payment');
    }
    

}
