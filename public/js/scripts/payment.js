var table;
var id = 0;
var id_collector = 0;
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    ListDatatable();
    //ListDatatableClients();
    SelectCollector();
    //Collector();
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
                data: 'expiration_discount'
            },
            {
                data: 'Agregar',
                orderable: false,
                searchable: false
            },
        ]
    });
};

//seleccionar cobrador

function SelectCollector() {
    $.ajax({
        url: "listcollector",
        method: 'get',
        data: {
            by: "all"
        },
        success: function (result) {
            var code = '<select class="form-control border-primary" name="collector_id" id="collector_id" onchange="Collector();" required>';
            $.each(result, function (key, value) {
                code += '<option selected value="' + value.id + '">' + value.name + '</option>';
            });
            code += '</select>';
            $("#select_collector").html(code);     
        },
        error: function (result) {
            toastr.error(result.msg + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
            console.log(result);
        },

    });
    Collector();
}


////////////////////////////////////////
// METODOS NECESARIOS

// obtiene los datos del formulario
function catch_parameters() {
    var data = $(".form-data").serialize();
    data += "&id=" + id;
    return data;

}

function Collector() {
  //  var cod = $('#collector_id').val();
  //  var name =$('#collector_id').text();
  //  console.log(cod);
  //  console.log(name);
  //  id_collector = cod;
 



   $("#collector_id").change(function() {
     var name=$('#collector_id option:selected').html()
     console.log(name);
     $("#name_collector").html(name);
});
}
