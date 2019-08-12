@extends('layouts.app')
@section('content')

<input id="user_id" name="user_id" value="{{ auth()->user()->id }}" type="hidden">
<div class="row">
    <div class="col-md-12">
        <div class="card border-primary shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-center">
                        <h2 class="card-title text-primary">COBROS</h2>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <hr>
                <h4 class="card-title text-primary"><i class="icon-box"></i>Cobros</h4>
                <div class="table-responsive">
                    <table id="tablepayment" class="table table-striped">
                        <thead>
                            <tr>
                                <td>Cod. Venta</td>
                                <td>Cobrador</td>
                                <td>Monto</td>
                                <td>Fecha</td>
                                <td>Eliminar</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    

@endsection
@section('scripts')
<script src="{{ URL::asset('js/scripts/charge.js') }}"></script>
@endsection