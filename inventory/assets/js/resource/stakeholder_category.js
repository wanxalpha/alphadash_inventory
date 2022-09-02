

var url = "../../controller/stakeholder_category.php";

$(document).on('click', ".stakeholder_category_delete", function (e) {
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
            $('#index_stakeholder_category').html(data);

        } else {

            $('#index_stakeholder_category').html('<tr><td rowspan="4">No Data</td></tr>')

        }
    })


$("#btn_search").click(function(){
    // toastAlert();
    search();
});

function search(){
    var url = "../../controller/stakeholder_category.php";
    var category = $('#Category').val();
    


    $.get(url, {
        action: 'list',
        category:category,
    })
    .done(function (data) {

        if (data) {
            $('#index_stakeholder_sector').html(data);

        } else {
            $('#index_stakeholder_sector').html('<tr><td rowspan="5">No Data</td></tr>')
        }
    })
}