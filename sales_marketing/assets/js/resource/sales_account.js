

var url = "../../controller/sales_account.php";

function getList(){
    $.get(url, {
        action: 'list'
    })
    .done(function (data) {
    
        if (data) {
            $('#index_sales_account').html(data);
    
        } else {
            $('#index_sales_account').html('<tr><td rowspan="5">No Data</td></tr>')
        }
    })
}

$('#btn_download_excel').click(function(){
   
    location.href = url + "?action=download_excel";
    
});

$(document).on('click', ".sales_account_delete", function (e) {
    // alert($(this).val());
    var json ={
        id :$(this).val() ,
        action:'delete'
    };

    deleteData(json,url,'POST');
});