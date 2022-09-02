
// $(document).on('click', ".sales_appoinment_delete", function (e) {

//     var json ={
//         id :$(this).data("id") ,
//         action:'delete'
//     };

//     deleteData(json,url,'POST');
// });
search();


$('#search').click(function() {
    search();
});


function search(){
    var url = "../../controller/sales_funnel.php";
    var status_month = $('#status_month').val();
    var status_year = $('#status_year').val();
    var status = $('#status').val();
    var category = $('#category').val();



    $.get(url, {
        action: 'list',
        status:status,
        month:status_month,
        year:status_year,
        category:category
    })
    .done(function (data) {

        if (data) {
            $('#index_sales_funnel').html(data);

        } else {
            $('#index_sales_funnel').html('<tr><td rowspan="5">No Data</td></tr>')
        }
    })
}

$('#status').on('change', function() {
    var value = $(this).val();

});