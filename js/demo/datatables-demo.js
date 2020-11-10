$(document).ready(function() {
    $('#tabla').DataTable( {
        "order": [[ 0, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                title: 	   'Copiados',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                title: 	   'Archivo Excel SGT',

                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-archive-o"></i>',
                title: 	   'Archivo CSV SGT',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                title: 	   'Archivo PDF - SGT',
                titleAttr: 'PDF'
            },
            {
                extend: 'colvis',
                text: 'Quite/Agregue campos'
            },

            {
                extend: 'print',
                text:      '<i class="fa fa-print"></i>',

                exportOptions: {
                    columns: ':visible',

                }
            },
        ],
        columnDefs: [ {
            text: 'Seleccion',
            targets: 1,
            visible: true
        } ],
 "language": {
            "lengthMenu": "Mostrando _MENU_ registros página por página",
            "zeroRecords": "No encontramos nada en la búsqueda por favor intente de otro dato",
            "info": "Mostrando Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay datos",
            "infoFiltered": "(Filtrando de _MAX_ de registros totales)",
            "search":"Buscar",

"paginate": {

            "first":      "Primero",
        	"last":       "Después",
       	    "next":       "Siguiente",
      		"previous":   "Anterior"
      		 },
        }


    } );
} );



$(document).ready(function() {
    $('#tabla2').DataTable( {
        "order": [[4, "desc" ]],
        dom: 'Bfrtip',
        buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i>',
                title:     'Copiados',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o"></i>',
                title:     'Archivo Excel SGT',

                titleAttr: 'Excel'
            },
            {
                extend:    'csvHtml5',
                text:      '<i class="fa fa-file-archive-o"></i>',
                title:     'Archivo CSV SGT',
                titleAttr: 'CSV'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>',
                title:     'Archivo PDF - SGT',
                titleAttr: 'PDF'
            },
            {
                extend: 'print',
                text:      '<i class="fa fa-print"></i>',

                exportOptions: {
                    columns: ':visible',

                }
            },
            'colvis'
        ],
        columnDefs: [ {
            lengthMenu: [[5, 10, 20, -1], [5, 10, 20, "Todos"]],
            targets: 4,
            visible: true
        } ],
        
 "language": {
            "lengthMenu": "Mostrando _MENU_ registros página por página",
            "zeroRecords": "No encontramos nada en la búsqueda por favor intente de otro dato",
            "info": "Mostrando Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay datos",
            "infoFiltered": "(Filtrando de _MAX_ de registros totales)",
            "search":"Buscar",

"paginate": {

            "first":      "Primero",
            "last":       "Después",
            "next":       "Siguiente",
            "previous":   "Anterior"
             },
        }


    } );
} );







$(document).ready(function() {
    $('#otratabla').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy',
            'excel',
            'csv',
            'pdf',
            'print'

        ]
    } );
} );

