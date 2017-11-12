$(document).ready(function() {
    $('#example').DataTable( {
    	dom: 'Bfrtip',
         lengthMenu: [
            [ 5, 10, 25, 50, -1 ],
            [ '5 rows','10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength',
            'print'
        ],
        paging:true,
        ordering:true,
        info:true,
        
    } );
} );