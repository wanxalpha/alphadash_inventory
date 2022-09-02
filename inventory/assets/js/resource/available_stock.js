

var url = "../../controller/available_stock.php";

$(document).on('click', ".stock_in_delete", function (e) {
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
            $('#index_available_stock').html(data);

        } else {

            $('#index_available_stock').html('<tr><td rowspan="4">No Data</td></tr>')

        }
    })


$("#btn_search").click(function(){
    // toastAlert();
    search();
});

function search(){
    var url = "../../controller/stock_in.php";
    var category = $('#Category').val();
    


    $.get(url, {
        action: 'list',
        category:category,
    })
    .done(function (data) {

        if (data) {
            $('#index_stock_in_sector').html(data);

        } else {
            $('#index_stock_in_sector').html('<tr><td rowspan="5">No Data</td></tr>')
        }
    })
}