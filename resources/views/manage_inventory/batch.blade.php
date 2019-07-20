@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h5 class="card-title text-primary">Lista de Lotes</h5>
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                        <button class="btn btn-outline-success" id="btn-agregar">
                            <i class="icon-plus"></i>&nbsp;Agregar
                        </button>
                    </div>
                </div>
                <div class="row p-2">
                    <div class="col-sm-12" id="msg-global">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table table-striped ">
                        <thead>
                            <tr>
                                <td>№</td>
                                <td>Codigo</td>
                                <td>Descripción</td>
                                <td>Producto</td>
                                <td>Estado</td>
                                <td>Detalle</td>
                                <td>Editar</td>
                                <td>Eliminar</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals-->
<!-- Modal Datos -->

<div class="modal fade bd-example-modal-xl" id="modal_datos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <center>
                    <h5 class="modal-title" id="title-modal"></h5>
                </center>

                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-data" id="form-data" novalidate>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputFirstname">Codigo de Lote:</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="Codigo de lote">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6" id="select_product">
                        </div>  

                        <div class="col-sm-6" id="select_line">
                        </div> 
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="inputLastname">Stock Inicial:</label>
                                <input type="text" class="form-control" id="initial_stock" name="initial_stock" placeholder="Stock Inicial">
                            </div>
                        <div class="col-sm-3">
                            <label for="inputLastname">Stock:</label>
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock">
                         </div>

                         <div class="col-sm-6">
                            <label for="inputLastname">Precio de Compra del Lote:</label>
                            <input type="text" class="form-control" id="batch_price" name="batch_price" placeholder="Precio de Compra">
                         </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputLastname">Precio de Venta Mayorista:</label>
                            <input type="text" class="form-control" id="wholesaler_price" name="wholesaler_price" placeholder="Precio de Venta Mayorista">
                        </div>
        
                        <div class="col-sm-6">
                            <label for="inputLastname">Precio de Venta Minorista:</label>
                            <input type="text" class="form-control" id="retail_price" name="retail_price" placeholder="Precio de Venta Minorista">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6" id="select_provider">
                        </div>  
        
                        <div class="col-sm-6" id="select_industry">
                        </div> 
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="inputLastname">Fecha de Entrada:</label>
                            <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                <input type="text" id="entry_date" name="entry_date" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
                                <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
            
                        <div class="col-sm-6">
                            <label for="inputLastname">Fecha de Vencimiento:</label>
                            <div class="input-group date" id="datetimepicker2" data-target-input="nearest">
                                <input type="text" id="expiration_date" name="expiration_date" class="form-control datetimepicker-input" data-target="#datetimepicker2"/>
                                <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>

                        
                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar<i class="icon-cancel"></i></button>
                    <button class="btn btn-success" type="submit">Aceptar<i class="icon-ok"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Eliminar -->
<div class="modal fade bd-example-modal-lg" id="modal_eliminar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">Eliminar</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h2>¿Está seguro que desea eliminar el registro?</h2>
            </div>
            <div class="modal-footer bg-dark">
                <button class="btn btn-danger" data-dismiss="modal">Cancelar<i class="icon-cancel"></i></button>
                <button class="btn btn-success" id="btn_delete">Aceptar<i class="icon-ok"></i></button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{ URL::asset('js/scripts/batch.js') }}"></script>
@endsection