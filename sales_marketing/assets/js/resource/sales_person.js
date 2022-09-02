var url = "../../controller/sales_person.php";

function getList(){
    $.get(url, {
        action: 'list'
    })
    .done(function (data) {
    
        if (data) {
            $('#index_sales_person').html(data);
    
        } else {
            $('#index_sales_person').html('<tr><td rowspan="3">No Data</td></tr>')
        }
    })
}

function getYearKPI(){
    var emp_id = $('#employee_id').val();
    var year_selected = $('#year_selected').val();

    $.get(url, {
        action: 'kpi',
        emp_id:emp_id,
        year_selected:year_selected
        
    })
    .done(function (data) {
    
        if (data) {
            $('#sales_kpi').html(data);
        } 
    })

    $.get(url, {
        action: 'summary_kpi',
        emp_id:emp_id,
        year_selected:year_selected
        
    })
    .done(function (data) {
        if (data) {
            $('#summary_kpi').html(data);
        } 
    })

}

$("#btn_search").click(function(){
    // toastAlert();
    getYearKPI();
});

$('#btn_export_excel').click(function(){
    var emp_id = $('#employee_id').val();
    var year_selected = $('#year_selected').val();

    location.href = url + "?action=excel&emp_id=" + emp_id + "&year_selected=" +year_selected;
});
