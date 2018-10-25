$(document).ready(function() {
var table = $('#table_id').DataTable( {
	"paging": true,
	language: {
		paginate: {
			previous: 'Prethodna',
			next:     'Slijedeća',
		},
		"info": "Prikaz _START_ do _END_ od _TOTAL_ zapisa",
		"search": "Filtriraj:",
		"lengthMenu": "Prikaži _MENU_ zapisa"
	},
	 "lengthMenu": [ 25, 50, 75, 100 ],
	 "pageLength": 50,
	 dom: 'Bfrtip',
		buttons: [
			{extend: "excel", className: "buttonsToHide"},
			{extend: "pdf", className: "buttonsToHide"},
			{extend: "print", className: "buttonsToHide"}
		/*{
			extend: 'pdfHtml5',
			text: 'Izradi PDF',
			exportOptions: {
				columns: ":not(.not-export-column)"
				}
			},*/
			{
		extend: 'excelHtml5',
		text: 'Izradi XLS',
		exportOptions: {
			columns: ":not(.not-export-column)"
		}
		},
		],
} );
$('a.toggle-vis').on( 'click', function (e) {
	e.preventDefault();

	// Get the column API object
	var column = table.column( $(this).attr('data-column') );

	// Toggle the visibility
	column.visible( ! column.visible() );
} );
} );
