var table;
var count = 0;

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    ListDatatablePayments();
   
});

function ListDatatablePayments() {
    table = $('#tablepayment').DataTable({
        dom: 'lfrtip',
        processing: true,
        serverSide: true,
        "paging": true,
        language: {
            "url": "/js/assets/Spanish.json"
        },
        ajax: {
            url: 'charge'

        },
        columns: [{
                data: 'sale_id'
            },
            {
                data: 'collector_name'
            },
            {
                data: 'payment'
            },
            {
                data: 'entry_date'
            },
            {
                data: 'Eliminar',
                orderable: false,
                searchable: false
            },
        ]
    });
};


