var url = "../../controller/sales_funnel.php";

// $(document).on('click', ".sales_appoinment_delete", function (e) {

//     var json ={
//         id :$(this).data("id") ,
//         action:'delete'
//     };

//     deleteData(json,url,'POST');
// });

$.get(url, {
        action: 'list',
        status:status
    })
    .done(function (data) {

        if (data) {
            $('#index_sales_funnel').html(data);

        } else {
            $('#index_sales_funnel').html('<tr><td rowspan="5">No Data</td></tr>')
        }
    })