var url = "../../controller/team_member.php";

$(document).on('click', ".team_member_delete", function (e) {
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
            $('#index_team_member').html(data);

        } else {

            $('#index_team_member').html('<tr><td rowspan="4">No Data</td></tr>')

        }
    })


$("#btn_search").click(function(){
    // toastAlert();
    search();
});

    function search(){
        var url = "../../controller/sales_sector.php";
        var category = $('#Category').val();
       
    
    
        $.get(url, {
            action: 'list',
            category:category,
        })
        .done(function (data) {
    
            if (data) {
                $('#index_team_member').html(data);
    
            } else {
                $('#index_team_member').html('<tr><td rowspan="5">No Data</td></tr>')
            }
        })
    }