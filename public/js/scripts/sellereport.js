$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    dateEntry();
    SelectSeller();

});


function Generate() {
    if($("#seller_id").val()== null){
        toastr.warning("Debe Seleccionar un Vendedor.");
    }
    else if($("#minimum_date").val()==0){
        toastr.warning("Debe Seleccionar una Fecha minima.");
    }
     else if($("#maximum_date").val()==0){
        toastr.warning("Debe seleccionar una Fecha Maxima.");
    }
    else{
        var data = {
            'seller_id' :   $("#seller_id").val(),
            'minimum_date' : $("#minimum_date").val(),
            'maximum_date' : $("#maximum_date").val(),
        };
        console.log(data);
        $.ajax({
            url: "/getselles",
            method: 'get',
            data: data,
            success: function (result) {
                if (result.success) {
                    console.log(result.success);
                } else {
                    toastr.warning(result.msg);
                    console.log(result.success);
                }
            },
            error: function (result) {
                console.log(result.responseJSON.message);
                toastr.error("CONTACTE A SU PROVEEDOR POR FAVOR.");
             
            },
        });
    }
}




function SelectSeller() {
    $.ajax({
        url: "listseller",
        method: 'get',
        data: {
            by: "all"
        },
        success: function (result) {
            var code = '<select class="form-control border-primary" name="seller_id" id="seller_id" required>';
            $.each(result, function (key, value) {
                code += '<option selected value="' + value.id + '">' + value.name + '</option>';
                code += '<option disabled value="" selected>(Seleccionar)</option>';
            });
            code += '</select>';
            $("#select_seller").html(code);
        },
        error: function (result) {
            toastr.error(result.msg + ' CONTACTE A SU PROVEEDOR POR FAVOR.');
            console.log(result);
        },

    });
}
//fecha de entrada
function dateEntry() {
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#datetimepicker1').datetimepicker();
        $('#datetimepicker2').datetimepicker({
            useCurrent: false
        });
        $("#datetimepicker1").on("change.datetimepicker", function (e) {
            $('#datetimepicker2').datetimepicker('minDate', e.date);
        });
        $("#datetimepicker2").on("change.datetimepicker", function (e) {
            $('#datetimepicker1').datetimepicker('maxDate', e.date);
        });
}