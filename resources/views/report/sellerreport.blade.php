@extends('layouts.app')
@section('content')

<input id="user_id" name="user_id" value="{{ auth()->user()->id }}" type="hidden">
<div class="row">
    <div class="col-md-12">
        <div class="card border-primary shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 d-flex justify-content-center">
                        <h2 class="card-title text-primary">REPORTE POR VENDEDOR</h2>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <div class="col-sm-3">
            <label for="expiration-date">Fecha Inicio:</label>
            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                <input type="text" id="expiration_date" name="expiration_date" class="form-control datetimepicker-input" data-target="#datetimepicker2" required/>
                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="icon-calendar"></i></div>
                </div>
            </div>
        </div>
        <br>
        <div class="col-sm-3">
            <label for="expiration-date">Fecha Finalización:</label>
            <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                <input type="text" id="expiration_date" name="expiration_date" class="form-control datetimepicker-input" data-target="#datetimepicker2" required/>
                <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="icon-calendar"></i></div>
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
                                <td>Fecha</td>
                                <td>Cliente</td>
                                <td>Nro de Venta</td>
                                <td>Total</td>
                                <td>Descuento</td>
                                <td>Total Descuento</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    


@endsection
@section('scripts')
<script src="{{ URL::asset('js/scripts/sellereport.js') }}"></script>
@endsection