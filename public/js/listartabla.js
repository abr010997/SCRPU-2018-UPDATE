function listarInforme() {
    var table = $('#tabla1').DataTable({//CONVERTIMOS NUESTRO LISTADO DE LA FORMA DEL JQUERY.DATATABLES- PASAMOS EL ID DE LA TABLA
        "sPaginationType": "full_numbers", //DAMOS FORMATO A LA PAGINACION(NUMEROS)
        "destroy": true,
        "ajax": {
            "method": "POST",
            "url": "?c=class04tramite&m=listarRetrasado"
        },
        "columns": [
            //{"data": "CD01CODPAC", "class": "hidden Codigo"},
            {"data": "PU04IDTRA", "class": "PU04IDTRA"},
            {"data": "PU04FEINICIO", "class": "PU04FEINICIO"},
            {"data": "PU04ESTADO", "class": "PU04ESTADO"}   
        ],
        "aaSorting": [[0, 'desc']],
        // "language": {
        //     "sProcessing": "Procesando...",
        //     "sLengthMenu": "Mostrar MENU registros",
        //     "sZeroRecords": "No se encontraron resultados",
        //     "sEmptyTable": "Ningún dato disponible en esta tabla",
        //     "sInfo": "Mostrando registros del START al END de un total de TOTAL registros",
        //     "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        //     "sInfoFiltered": "(filtrado de un total de MAX registros)",
        //     "sInfoPostFix": "",
        //     "sSearch": "Buscar:",
        //     "sUrl": "",
        //     "sInfoThousands": ",",
        //     "sLoadingRecords": "Cargando...",
        //     "oPaginate": {
        //         "sFirst": "Primero",
        //         "sLast": "Último",
        //         "sNext": "Siguiente",
        //         "sPrevious": "Anterior"
        //     }
            // "oAria": {
            //     "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            //     "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            // }
        // },
        // dom: 'Bfrtip',
        // "buttons": [
        //     {
        //         extend: 'pdfHtml5',
        //         text: '<i class="fa fa-file-pdf-o"></i>',
        //         titleAttr: 'PDF'
        //     }
        // ]
    });
}