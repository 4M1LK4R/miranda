var title_modal_data="Registro Nuevo";
var type_catalog_id=1;
var id=0;
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    ListDatatable();
    catch_parameters();
});


// funcion para volver a mayusculas
function Mayus(e) {
    e.value = e.value.toUpperCase();
}
// obtiene los datos de los formularios
function catch_parameters()
{
    var data = $(".form-data").serialize();
    data += "&id="+id;
    data += "&type_catalog_id="+type_catalog_id;
    console.log(data);
    return data;
}



function ListDatatable()
{
   var table = $('#table').DataTable({
        dom: 'lfBrtip',
        processing: true,
        serverSide: true,
        "paging": true,
        ajax: {
            url: 'brand-datatable',
            data: function (obj) {
                obj.type_catalog_id = type_catalog_id;
            }
        },
        columns: [
            { data: 'name'},
            { data: 'state'},
            { data: 'description'},
            { data: 'Editar',   orderable: false, searchable: false },
            { data: 'Eliminar', orderable: false, searchable: false },
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
                    //__Stop Event Submit
                    event.preventDefault();
                    event.stopPropagation();
                    console.log("entrando");
                    if (id == 0) {
                        console.log("entradno a guardar");
                        SaveNew();
                    } else {
                        //Save();
                    }
                    $('#modal_datos').modal('hide');
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();

$("#btn-agregar").click(function () {
    $("#title-modal").html(title_modal_data);
    $("#modal_datos").modal("show");
});

function SaveNew() {
    console.log("Guardando...");
    $.ajax({
        url: "catalog/store",
        method: 'post',
        data: catch_parameters(),
        success: function (result) {
            //console.log(result);
            if (result.success) {
                console.log("se registro ");
            } else {
                console.log(result);
            }
        },
        error: function (result) {
            
            console.log(result);
        },
    });

   // table.ajax.reload();
    
}
function Save() {
    var values_new = $(".form-data").serialize();
    if (values_old != values_new) {
        $.ajax({
            url: "../Catalogos/Update",
            method: 'post',
            data: catch_parameters(),
            success: function (result) {
                console.log(result);
                if (result.success) {
                    
                } else {
                    console.log(result);
                    
                }
            },
            error: function (result) {
                console.log(result);
                
            },
        });
        table.ajax.reload();
    }
    ListDataTable();
}