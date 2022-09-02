var url = "../../controller/product_service.php";

$(document).on('click', ".project_pillar_delete", function (e) {
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
            $('#index_project_service').html(data);

        } else {

            $('#index_project_service').html('<tr><td rowspan="5">No Data</td></tr>')

        }
    })