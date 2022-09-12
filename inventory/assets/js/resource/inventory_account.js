

var url = "../../controller/inventory_account.php";

function getList(){
    $.get(url, {
        action: 'list'
    })
    .done(function (data) {
    
        if (data) {
            $('#index_inventory_account').html(data);
    
        } else {
            $('#index_inventory_account').html('<tr><td rowspan="5">No Data</td></tr>')
        }
    })
}

$('#btn_download_excel').click(function(){
   
    location.href = url + "?action=download_excel";
    
});

$(document).on('click', ".inventory_account_delete", function (e) {
    // alert($(this).val());
    var json ={
        id :$(this).val() ,
        action:'delete'
    };

    deleteData(json,url,'POST');
});