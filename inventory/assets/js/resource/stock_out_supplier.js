

var url = "../../controller/stock_out_supplier.php";

$(document).on('click', ".stock_out_supplier_delete", function (e) {
    // alert($(this).val());
    var json ={
        id :$(this).val() ,
        action:'delete'
    };

    deleteData(json,url,'POST');
});

$.get(url, { 
        action: 'list'
    })
    .done(function (data) {

        if (data) {
            $('#index_stock_out_supplier').html(data);

        } else {

            $('#index_stock_out_supplier').html('<tr><td rowspan="4">No Data</td></tr>')

        }
    })


$("#search").click(function(){
    search();
});

function search(){
    var url = "../../controller/stock_out_supplier.php";
    var month = $('#filter_month').val();
    var year = $('#filter_year').val();
    var stakeholder = $('#filter_stakeholder').val();
    
    $.get(url, {
        action: 'list',
        month:month,
        year:year,
        stakeholder:stakeholder,
    })
    .done(function (data) {

        if (data) {
            $('#index_stock_out_supplier').html(data);

        } else {
            $('#index_stock_out_supplier').html('<tr><td rowspan="5">No Data</td></tr>')
        }
    })
}

$('#btn_export_excel').click(function(){
    var month = $('#filter_month').val();
    var year = $('#filter_year').val();

    location.href = url + "?action=export&month=" + month + "&year=" + year;
});

$('#btn_export_pdf').click(function(){
    var month = $('#filter_month').val();
    var year = $('#filter_year').val();

    location.href = url + "?action=exportPdf&month=" + month + "&year=" + year;
});
