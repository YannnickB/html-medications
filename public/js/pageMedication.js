// A $( document ).ready() block.
$( document ).ready(function() {
    loadMedication( 0 );
});


function loadMedication( MedicationId ){
	$("#list").fillListAjax( "ajax.php?type=medication?MedicationId="+MedicationId, "medication.php?MedicationId=[MedicationId]",
		function( id ){
			console.log( "CLICK" );
		},
		function( element, data ){
			console.log( "SUCCESS" );
		},
		function( result, url ){
			console.log( "ERROR" );
		}
	);
}
