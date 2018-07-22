$(document).ready(function() {
        var dataTable = $('#grid-puestos').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax":{
                url :"employee-grid-data.php", // json datasource
                type: "post",  // method  , by default get
                error: function(){  // error handling
                    $(".grid-puestos-error").html("");
                    $("#grid-puestos").append('<tbody class="grid-puestos-error"><tr><td colspan="3">No data found in the server</td></tr></tbody>');
                    $("#employee-grid_processing").css("display","none");
 
                }
            }
        } );
    } );