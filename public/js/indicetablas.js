
$(document).ready(function() {
    $('table.display').DataTable({
        language: {
            processing:     "Procesando...",
            lengthMenu:     "Mostrar _MENU_ registros",
            zeroRecords:    "No se encontraron resultados",
            emptyTable:     "Ningún dato disponible en esta tabla",
            info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            infoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
            infoFiltered:   "(filtrado de un total de _MAX_ registros)",
            infoPostFix:    "",
            search:         "Buscar:",
            url:            "",
            infoThousands:  ",",
            loadingRecords: "Cargando...",
            paginate: {
                first:    "Primero",
                last:     "Último",
                next:     "Siguiente",
                previous: "Anterior"
            },
            aria: {
                sortAscending:  ": Activar para ordenar la columna de manera ascendente",
                sortDescending: ": Activar para ordenar la columna de manera descendente"
            }
        },
        destroy: true
    });
    /*$('#grilla-puestos').DataTable();
    $('#grilla-usuarios').DataTable();
    $('#grilla-actdes').DataTable();
    $('#grilla-terrft').DataTable();
    $('#grilla-regcor').DataTable();
    $('#grilla-desceg').DataTable();
    $('#grilla-aspbio').DataTable();
    $('#grilla-tipdesec').DataTable();
    $('#grilla-aarep').DataTable();
    $('#grilla-servae').DataTable();
    $('#grilla-calleser').DataTable();
    $('#grilla-desas').DataTable();
    $('#grilla-serrvi').DataTable();
    $('#grilla-infest').DataTable();
    $('#grilla-planreg').DataTable();
    $('#grilla-capuso').DataTable();
    $('#grilla-clases').DataTable();
    $('#grilla-tipsue').DataTable();
    $('#grilla-retrasados').DataTable();
    $('#grilla-nuevos').DataTable();
    $('#grilla-inspeccion').DataTable();
    $('#grilla-oficina').DataTable();
    $('#grilla-aceptados').DataTable();
    $('#grilla-denegados').DataTable();*/
});

