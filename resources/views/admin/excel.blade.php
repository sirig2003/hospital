<script src="   https://code.jquery.com/jquery-3.5.1.js">
</script>
 <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js">
 </script>
 <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js">
 </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
 </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js">
 </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
 </script>
 <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js">
 </script>
 <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js">
 </script>

<script>
$(document).ready(function() {
   $('#viewdocs').DataTable( {
       dom: 'Bfrtip',
       "pageLength": 25,
       buttons: [
           {extend: "copy", className: "btn-primary"},
           {extend: "csv", className: "btn-primary"},
           {extend: "excel", className: "btn-primary"},
           {extend: "pdf", className: "btn-primary"},
           {extend: "print", className: "btn-primary"}
       ]
   } );
} );
</script>