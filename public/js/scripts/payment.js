var table;
var id = 0;
var stock = 0;
var title_modal_data = "Registrar Nuevo Lote";
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    ListDatatable();
    //ListDatatableClients();
    //SelectSeller();
    //DateTimePicker();
    //catch_parameters();
});


// datatable catalogos
function ListDatatable() {
    table = $('#table').DataTable({
        dom: 'lfrtip',
        processing: true,
        serverSide: true,
        "paging": true,
        language: {
            "url": "/js/assets/Spanish.json"
        },
        ajax: {
            url: 'payment'

        },
        columns: [{
                data: 'id'
            },
            {
                data: 'client_name'
            },
            {
                data: 'total'
            },
            {
                data: 'total_discount'
            },
            {
                data: 'discount'
            },
            {
                data: 'Detalle',
                orderable: false,
                searchable: false
            },
            {
                data: 'Agregar',
                orderable: false,
                searchable: false
            },
        ]
    });
};