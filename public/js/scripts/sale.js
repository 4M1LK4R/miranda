var table;
var id=0;
var title_modal_data = "Registrar Nuevo Cliente";
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    ListDatatable();
});
// datatable catalogos
function ListDatatable()
{
    table = $('#table').DataTable({
        dom: 'lfBrtip',
        processing: true,
        serverSide: true,
        "paging": true,
        language: {
            "url": "/js/assets/Spanish.json"
        },
        ajax: {
            url: '/sale'         
        },
        columns: [
            { data: 'id'},
            { data: 'user_name'},
            { data: 'client_name'},
            { data: 'seller_name'},
            { data: 'date'},
            { data: 'total'},
            { data: 'total_discount'},
            { data: 'discount'},
            { data: 'expiration_discount'},
            { data: 'payment_status'},
            { data: 'state',
            "render": function (data, type, row) {
                if (row.state === 'ACTIVO') {
                    return '<center><p class="bg-success text-white"><b>ACTIVO</b></p></center>';
                }
                else if (row.state === 'INACTIVO') {          
                    return '<center><p class="bg-warning text-white"><b>INACTIVO</b></p></center>';
                }
                else if (row.state === 'ELIMINADO') {          
                    return '<center><p class="bg-danger text-white"><b>ELIMINADO</b></p></center>';
                }
            }
        },
            { data: 'Detalles',   orderable: false, searchable: false },
            { data: 'NotaVenta',   orderable: false, searchable: false },
            { data: 'Eliminar', orderable: false, searchable: false }
        ],
        
        buttons: [
            {
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

var string = "";
// detalle de lote
function Detail(id) {
    string = "";

    //Metodo para traer datos de la venta
    $.ajax({
        url: "sale/{sale}",
        method: 'get',
        data: {
            id: id
        },
        success: function (result) {
            console.log(result);
            //show_detail(result);

        },
        error: function (result) {
            toastr.error(result + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
            console.log(result);
        },
    });



    //Metodo para traer todos los detalles de la venta
    $.ajax({
        url: "/details_of_sale",
        method: 'get',
        data: {
            id: id
        },
        success: function (result) {
            console.log(result);
            $.each(result, function (key, value) {
                //show_detail(value);
                //console.log(value);
                //Metodo para traer todos los datos de un detalle
                $.ajax({
                    url: "detail/{detail}",
                    method: 'get',
                    data: {
                        id: value.id
                    },
                    success: function (result) {
                        console.log(result);
                        //show_detail(result);
            
                    },
                    error: function (result) {
                        toastr.error(result + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
                        console.log(result);
                    },
                });





            });
            //show_detail(result);
        },
        error: function (result) {
            toastr.error(result + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
            console.log(result);
        },
    });


};


//muestra el detalle
function show_detail(obj) {

    //console.log(obj);
    //DATOS DE PRODUCTO
    string += "<p><h5><b>USUARIO</b></h5></p>";
    string += "<p><b>Registrado por:</b>&nbsp;" + obj.user.name + "</p>";
    string += "<hr>";
    string += "<p><h5><b>DATOS DE PRODUCTO</b></h5></p>";
    string += "<p><b>Código de lote:</b>&nbsp;" + obj.code + "</p>";
    string += "<p><b>Producto:</b>&nbsp;" + obj.product.name + "</p>";
    string += "<p><b>Stock:</b>&nbsp;" + obj.stock + "</p>";
    string += "<p><b>Línea:</b>&nbsp;" + obj.line.name + "</p>";
    string += "<p><b>Registro sanitario:</b>&nbsp;" + obj.sanitary_registration + "</p>";
    string += "<p><b>Fecha de expiración:</b>&nbsp;" + obj.expiration_date + "</p>";
    string += "<p><b>Industria:</b>&nbsp;" + obj.industry.name + "</p>";
    string += "<p><b>Proveedor:</b>&nbsp;" + obj.provider.name + "</p>";
    string += "<p><b>Estado:</b>&nbsp;" + obj.state + "</p>";
    if (obj.description != null) {
        string += "<p><b>Descripción:</b>&nbsp;" + obj.description + "</p>";
    } else {
        string += "<p><b>Descripción:</p>";
    }
    string += "<hr>";
    //DATOS DE INVENTARIO
    string += "<p><h5><b>DATOS DE INVENTARIO</b></h5></p>";
    string += "<p><b>Almacén:</b>&nbsp;" + obj.storage.name + "</p>";
    string += "<p><b>Precio de venta:</b>&nbsp;" + obj.wholesaler_price + "</p>";
    $("#title-modal-detalle").html("Detalle de Lote");
    $('#content_detalle').html(string);
    $('#modal_detalle').modal('show');
};
//funcion para eliminar valor seleccionado
function Delete(id_) {
    id= id_;
    $('#modal_eliminar').modal('show');
}
$("#btn_delete").click(function () {
    $.ajax({
        url: "sale/{sale}",
        method: 'delete',
        data: {
            id: id
        },
        success: function (result) {
            if (result.success) {
                toastr.success(result.msg,{"progressBar": true,"closeButton": true});
            } else {
                toastr.warning(result.msg);
            }
        },
        error: function (result) {
            toastr.error(result.msg +' CONTACTE A SU PROVEEDOR POR FAVOR.');
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
    id=0;
};