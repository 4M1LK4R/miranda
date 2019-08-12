var table;
var count = 0;
var result = 0;
var amount = 0;
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    ListDatatable();
    ListDatatablePayments();
    SelectCollector();
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
                data: 'receive'
            },
            {
                data: 'expiration_discount'
            },
            {
                data: 'SelectSale',
                orderable: false,
                searchable: false
            },
        ]
    });
};



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
var id_collector = 0;
var id_sale = 0;

function Save() {
    if($("#payment").val()== 0){
        toastr.warning("Debe introducir un monto que cobro.");
    }
     else if(id_sale==0){
        toastr.warning("Debe seleccionar una venta.");
    }
    
    else if (id_collector != null){
        var d = new Date();
        var currenDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
        var data = {
            'collector_id' : id_collector,
            'sale_id' : id_sale,
            'state' : 'ACTIVO',
            'payment' : $("#payment").val(),
            'entry_date':currenDate.toString(),
        };
        console.log(data);
        Get(id_sale);
        $.ajax({
            url: "payment",
            method: 'post',
            data: data,
            success: function (result) {
                if (result.success) {
                    toastr.success(result.msg);
                    ClearInputs();
                } else {
                    toastr.warning(result.msg);
                }
            },
            error: function (result) {
                console.log(result.responseJSON.message);
                toastr.error("CONTACTE A SU PROVEEDOR POR FAVOR.");
                ClearInputs();
            },
        });
    }
    else {
        toastr.warning("Debe seleccionar un cobrador.");
    }
    table.ajax.reload();
    

}


function SaleUpdate(data){
        
        var data = {
            'receive':data,
            'id':id_sale,
        };
        console.log(data);
        $.ajax({
            url: "payment/{payment}",
            method: 'put',
            data: data,
            success: function (result) {
                if (result.success) {
                    console.log(result.msg);
    
                } else {
                    console.log(result.msg);
                }
            },
            error: function (result) {
                console.log(result.responseJSON.message);
                toastr.error("CONTACTE A SU PROVEEDOR POR FAVOR.");
            },       
        });
        table.ajax.reload();
}



////////////////////////////////////////
// METODOS NECESARIOS
function Collector() {
    var cod = $( "#collector_id" ).val();
    id_collector = cod;
    var name=$("#collector_id  option:selected").text();
    $("#name_collector").html(name);
}

function SelectSale(id){
    id_sale=id;
    console.log(id_sale);
    $("#code_sale").html(id);
    
    
}
function ClearInputs() {
    
    //$("#name_collector").text().empty();
    //$("#code_sale").text().empty();
    //$("#payment").text().empty();
};

function Get(id) {
    $.ajax({
        url: "sale/{sale}",
        method: 'get',
        data: {
            id: id
        },
        success: function (result) {
            console.log(result.receive);
            count=result.receive;
            conver();

        },
        error: function (result) {
            toastr.error(result + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
            console.log(result);
        },
    });
}
function conver()
{   
    result = parseFloat(count);
    amount = parseFloat($("#payment").val());
    result = result + amount;
    console.log(result);
    SaleUpdate(result);

}