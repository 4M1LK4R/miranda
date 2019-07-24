var table;
var id = 0;
var title_modal_data = "Registrar Nuevo Lote";
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    ListDatatable();
    SelectProduct();
    SelectLine();
    SelectIndustry();
    SelectPaymentStatus();
    SelectProvider();
    SelectStorage();
    SelectPaymentType();
    dateEntry();
    dateExpiration();
    catch_parameters();
});
// datatable catalogos
function ListDatatable() {
    table = $('#table').DataTable({
        dom: 'lfBrtip',
        processing: true,
        serverSide: true,
        "paging": true,
        language: {
            "url": "/js/assets/Spanish.json"
        },
        ajax: {
            url: 'batch'

        },
        columns: [{
                data: 'id'
            },
            {
                data: 'code'
            },
            {
                data: 'description'
            },
            {
                data: 'product_id'
            },
            {
                data: 'state'
            },
            {
                data: 'Detalle',
                orderable: false,
                searchable: false
            },
            {
                data: 'Editar',
                orderable: false,
                searchable: false
            },
            {
                data: 'Eliminar',
                orderable: false,
                searchable: false
            },
        ],
        buttons: [{
                text: '<i class="icon-eye"></i> ',
                className: 'rounded btn-dark m-2',
                titleAttr: 'Columnas',
                extend: 'colvis'
            },
            {
                text: '<i class="icon-download"></i><i class="icon-file-excel"></i>',
                className: 'rounded btn-dark m-2',
                titleAttr: 'Excel',
                extend: 'excel',
                exportOptions: {
                    columns: [0, 1, 2]
                }
            },
            {
                text: '<i class="icon-download"></i><i class="icon-file-pdf"></i> ',
                className: 'rounded btn-dark m-2',
                titleAttr: 'PDF',
                extend: 'pdf',
                exportOptions: {
                    columns: [0, 1, 2]
                }
            },
            {
                text: '<i class="icon-download"></i><i class="icon-print"></i> ',
                className: 'rounded btn-dark m-2',
                titleAttr: 'Imprimir',
                extend: 'print',
                exportOptions: {
                    columns: [0, 1, 2]
                }
            },
            //btn Refresh
            {
                text: '<i class="icon-arrows-cw"></i>',
                className: 'rounded btn-info m-2',
                action: function () {
                    table.ajax.reload();
                }
            }
        ],
    });
};




// guarda los datos nuevos
function Save() {
    $.ajax({
        url: "batch",
        method: 'post',
        data: catch_parameters(),
        success: function (result) {
            if (result.success) {
                console.log("se registro ");
                toastr.success(result.msg, {
                    "progressBar": true,
                    "closeButton": true
                });

            } else {
                toastr.warning(result.smg);
                console.log(result);
            }
        },
        error: function (result) {
            toastr.error(result.errors + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
            console.log(result.errors);
        },
    });
    table.ajax.reload();
}

function Show(id) {
    $.ajax({
        url: "detail",
        method: 'get',
        data: {
            id: id
        },
        success: function (result) {
            show_(result);
            //console.log(result.user.name);
            //console.log(result);
        },
        error: function (result) {
            toastr.error(result + ' CONTACTE A SU PROVEEDOR POR FAVOR.');

            console.log(result);
        },

    });
};

function show_(obj) {
    var string = "";
    //console.log(key);
    //console.log(obj.industry.name);
    string += "<b>DETALLE DE LOTE</b>";
    string += "<hr>";
    string +="<p><b>Usuario:&nbsp;</b>"+ obj.user.name +"</p>";
    string +="<p><b>Codigo de Lote:&nbsp;</b>"+ obj.code +"</p>";
    $("#user_id").val(obj.user_id)

    $("#id").val(obj.id);
    //datos de producto
    $("#code").val(obj.code);
    $("#product_id").val(obj.product_id);
    $("#line_id").val(obj.line_id);
    $("#provider_id").val(obj.provider_id);
    $("#industry_id").val(obj.industry_id);
    $("#expiration_date").val(obj.expiration_date);
    $("#state").val(obj.state);
    $("#description").val(obj.description);
    //datos de compra
    $("#payment_status_id").val(obj.payment_status_id);
    $("#payment_type_id").val(obj.payment_type_id);
    $("#batch_price").val(obj.batch_price);
    $("#initial_stock").val(obj.initial_stock);
    $("#entry_date").val(obj.entry_date);
    // datos de inventario
    $("#storage_id").val(obj.storage_id);
    $("#stock").val(obj.stock);
    $("#wholesaler_price").val(obj.wholesaler_price);
    $("#retail_price").val(obj.retail_price);


    //console.log(obj.code);
    //id= obj.id;
    // string +="<p><b class='h6'>USUARIO: &nbsp;</b>"+ obj.user.name +"</p>";


    $("#title-modal-detalle").html("Detalle de Lote");
    $('#content_detalle').html(string);
    $('#modal_detalle').modal('show');
};







// captura los datos
function Edit(id) {
    $.ajax({
        url: "batch/{batch}/edit",
        method: 'get',
        data: {
            id: id
        },
        success: function (result) {
            console.log(result);
            //show_data(result);
        },
        error: function (result) {
            toastr.error(result + ' CONTACTE A SU PROVEEDOR POR FAVOR.');

            console.log(result);
        },

    });
};

/// muestra la vista con los datos capturados
var data_old;

function show_data(obj) {
    ClearInputs();
    //console.log(obj)
    obj = JSON.parse(obj);
    id = obj.id;
    $("#name").val(obj.name);
    $("#description").val(obj.description);
    $("#catalog_product_id").val(obj.catalog_product_id);
    if (obj.state == "ACTIVO") {
        $('#estado_activo').prop('checked', true);
    }
    if (obj.state == "INACTIVO") {
        $('#estado_inactivo').prop('checked', true);
    }
    $("#title-modal").html("Editar Registro");

    data_old = $(".form-data").serialize();

    $('#modal_datos').modal('show');
};

// actualiza los datos
function Update() {
    var data_new = $(".form-data").serialize();
    if (data_old != data_new) {
        $.ajax({
            url: "product/{product}",
            method: 'put',
            data: catch_parameters(),
            success: function (result) {
                if (result.success) {
                    toastr.success(result.msg, {
                        "progressBar": true,
                        "closeButton": true
                    });
                } else {
                    toastr.warning(result.msg);
                }
            },
            error: function (result) {
                toastr.error(result.msg + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
            },
        });
        table.ajax.reload();

    }
}

//funcion para eliminar valor seleccionado
function Delete(id_) {
    id = id_;
    $('#modal_eliminar').modal('show');
}
$("#btn_delete").click(function () {
    $.ajax({
        url: "product/{product}",
        method: 'delete',
        data: {
            id: id
        },
        success: function (result) {
            if (result.success) {
                toastr.success(result.msg, {
                    "progressBar": true,
                    "closeButton": true
                });
            } else {
                toastr.warning(result.msg);
            }
        },
        error: function (result) {
            toastr.error(result.msg + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
            console.log(result);
        },

    });
    table.ajax.reload();
    $('#modal_eliminar').modal('hide');
});




//////////////////////////////////////////////

// METODOS NECESARIOS
// funcion para volver mayusculas
function Mayus(e) {
    e.value = e.value.toUpperCase();
}

// obtiene los datos del formulario
function catch_parameters() {
    var data = $(".form-data").serialize();
    data += "&id=" + id;
    console.log(data);
    return data;

}



// muestra el modal
$("#btn-agregar").click(function () {
    ClearInputs();
    $("#title-modal").html(title_modal_data);
    $("#modal_datos").modal("show");
});



// metodo de bootstrap para validar campos

(function () {
    'use strict';
    window.addEventListener('load', function () {
        var forms = document.getElementsByClassName('form-data');
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    event.preventDefault();
                    event.stopPropagation();
                    if (id == 0) {
                        Save();
                    } else {
                        Update();
                    }
                    $('#modal_datos').modal('hide');
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

/// limpi campos despues de utilizar el modal
function ClearInputs() {
    var forms = document.getElementsByClassName('form-data');
    Array.prototype.filter.call(forms, function (form) {
        form.classList.remove('was-validated');
    });
    //__Clean values of inputs
    $("#form-data")[0].reset();
    id = 0;
};

//fecha de entrada
function dateEntry() {
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD'
    });
}

//fecha de expiracion
function dateExpiration() {
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
}

// seleccion de productos
function SelectProduct() {
    $.ajax({
        url: "listproduct",
        method: 'get',
        data: {
            by: "all",
        },
        success: function (result) {
            var code = '<div class="form-group">';
            code += '<label for="product"><b>Producto:</b></label>';
            code += '<select class="form-control" name="product_id" id="product_id" required>';
            code += '<option disabled value="" selected>(Seleccionar)</option>';
            $.each(result, function (key, value) {
                code += '<option value="' + value.id + '">' + value.name + '</option>';
            });
            code += '</select>';
            code += '<div class="invalid-feedback">';
            code += 'Dato necesario.';
            code += '</div>';
            code += '</div>';
            $("#select_product").html(code);
        },
        error: function (result) {
            toastr.error(result.msg + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
            console.log(result);
        },

    });
}

// seleccion de proveedor
function SelectProvider() {
    $.ajax({
        url: "listprovider",
        method: 'get',
        data: {
            by: "all",
        },
        success: function (result) {
            var code = '<div class="form-group">';
            code += '<label for="provider"><b>Proveedor:</b></label>';
            code += '<select class="form-control" name="provider_id" id="provider_id" required>';
            code += '<option disabled value="" selected>(Seleccionar)</option>';
            $.each(result, function (key, value) {
                code += '<option value="' + value.id + '">' + value.name + '</option>';
            });
            code += '</select>';
            code += '<div class="invalid-feedback">';
            code += 'Dato necesario.';
            code += '</div>';
            code += '</div>';
            $("#select_provider").html(code);
        },
        error: function (result) {
            toastr.error(result.msg + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
            console.log(result);
        },

    });
}


//seleccion de linea de producto
function SelectLine() {
    $.ajax({
        url: "listcatalog",
        method: 'get',
        data: {
            by: "type_catalog_id",
            type_catalog_id: 4
        },
        success: function (result) {
            var code = '<div class="form-group">';
            code += '<label for="line-product"><b>Linea de Producto:</b></label>';
            code += '<select class="form-control" name="line_id" id="line_id" required>';
            code += '<option disabled value="" selected>(Seleccionar)</option>';
            $.each(result, function (key, value) {
                code += '<option value="' + value.id + '">' + value.name + '</option>';
            });
            code += '</select>';
            code += '<div class="invalid-feedback">';
            code += 'Dato necesario.';
            code += '</div>';
            code += '</div>';
            $("#select_line").html(code);
        },
        error: function (result) {
            toastr.error(result.msg + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
            console.log(result);
        },

    });
}
// seleccionar industria
function SelectIndustry() {
    $.ajax({
        url: "listcatalog",
        method: 'get',
        data: {
            by: "type_catalog_id",
            type_catalog_id: 6
        },
        success: function (result) {
            var code = '<div class="form-group">';
            code += '<label for="industry-product"><b>Industria de Producto:</b></label>';
            code += '<select class="form-control" name="industry_id" id="industry_id">';
            code += '<option disabled value="" selected>(Seleccionar)</option>';
            $.each(result, function (key, value) {
                code += '<option value="' + value.id + '">' + value.name + '</option>';
            });
            code += '</select>';
            code += '<div class="invalid-feedback">';
            code += 'Dato necesario.';
            code += '</div>';
            code += '</div>';
            $("#select_industry").html(code);
        },
        error: function (result) {
            toastr.error(result.msg + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
            console.log(result);
        },

    });
}

//seleccionar almacen
function SelectStorage() {
    $.ajax({
        url: "listcatalog",
        method: 'get',
        data: {
            by: "type_catalog_id",
            type_catalog_id: 2
        },
        success: function (result) {
            var code = '<div class="form-group">';
            code += '<label for="storage"><b>Almacen:</b></label>';
            code += '<select class="form-control" name="storage_id" id="storage_id" required>';
            code += '<option disabled value="" selected>(Seleccionar)</option>';
            $.each(result, function (key, value) {
                code += '<option value="' + value.id + '">' + value.name + '</option>';
            });
            code += '</select>';
            code += '<div class="invalid-feedback">';
            code += 'Dato necesario.';
            code += '</div>';
            code += '</div>';
            $("#select_storage").html(code);
        },
        error: function (result) {
            toastr.error(result.msg + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
            console.log(result);
        },

    });
}

//seleccionar  estado de pago
function SelectPaymentStatus() {
    $.ajax({
        url: "listcatalog",
        method: 'get',
        data: {
            by: "type_catalog_id",
            type_catalog_id: 7
        },
        success: function (result) {
            var code = '<div class="form-group">';
            code += '<label for="payment-status"><b>Estado de Pago:</b></label>';
            code += '<select class="form-control" name="payment_status_id" id="payment_status_id" required>';
            code += '<option disabled value="" selected>(Seleccionar)</option>';
            $.each(result, function (key, value) {
                code += '<option value="' + value.id + '">' + value.name + '</option>';
            });
            code += '</select>';
            code += '<div class="invalid-feedback">';
            code += 'Dato necesario.';
            code += '</div>';
            code += '</div>';
            $("#select_payment_status").html(code);
        },
        error: function (result) {
            toastr.error(result.msg + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
            console.log(result);
        },

    });
}

//seleccionar tipo de pago
function SelectPaymentType() {
    $.ajax({
        url: "listcatalog",
        method: 'get',
        data: {
            by: "type_catalog_id",
            type_catalog_id: 8
        },
        success: function (result) {
            var code = '<div class="form-group">';
            code += '<label for="payment-type"><b>Tipo de Pago:</b></label>';
            code += '<select class="form-control" name="payment_type_id" id="payment_type_id" required>';
            code += '<option disabled value="" selected>(Seleccionar)</option>';
            $.each(result, function (key, value) {
                code += '<option value="' + value.id + '">' + value.name + '</option>';
            });
            code += '</select>';
            code += '<div class="invalid-feedback">';
            code += 'Dato necesario.';
            code += '</div>';
            code += '</div>';
            $("#select_payment_type").html(code);
        },
        error: function (result) {
            toastr.error(result.msg + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
            console.log(result);
        },

    });
}
