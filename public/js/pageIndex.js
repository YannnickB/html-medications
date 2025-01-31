// A $( document ).ready() block.
$( document ).ready(function() {
    loadMedications();
});


function loadMedications(){
	$("#list").fillListAjax( "ajax.php?type=medications", "medication.php?MedicationId=[MedicationId]",
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
