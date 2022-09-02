var url = "../../controller/sales_appoinment.php";

// $(document).on('click', ".sales_appoinment_delete", function (e) {

//     var json ={
//         id :$(this).data("id") ,
//         action:'delete'
//     };

//     deleteData(json,url,'POST');
// });

$.get(url, {
        action: 'list'
    })
    .done(function (data) {

        if (data) {
            $('#index_sales_appoinment').html(data);

        } else {
            $('#index_sales_appoinment').html('<tr><td rowspan="5">No Data</td></tr>')
        }
    })