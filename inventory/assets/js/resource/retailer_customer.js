

var url = "../../controller/retailer_customer.php";

$(document).on('click', ".retailer_customer_delete", function (e) {
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
            $('#index_retailer_customer').html(data);

        } else {

            $('#index_retailer_customer').html('<tr><td rowspan="4">No Data</td></tr>')

        }
    })


$("#btn_search").click(function(){
    // toastAlert();
    search();
});

function search(){
    var url = "../../controller/product.php";
    var category = $('#Category').val();
    


    $.get(url, {
        action: 'list',
        category:category,
    })
    .done(function (data) {

        if (data) {
            $('#index_product_sector').html(data);

        } else {
            $('#index_product_sector').html('<tr><td rowspan="5">No Data</td></tr>')
        }
    })
}