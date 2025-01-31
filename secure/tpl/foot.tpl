	
	<!-- jQuery -->
	<script src="<{$config.rootUrl}>/node_modules/jquery/dist/jquery.min.js"></script>
			
	<!-- Popper.js -->
	<script src="<{$config.rootUrl}>/node_modules/@popperjs/core/dist/umd/popper.min.js"></script>

	<!-- Bootstrap -->
	<script src="<{$config.rootUrl}>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Toastr -->
	<script src="<{$config.rootUrl}>/node_modules/toastr/build/toastr.min.js"></script>

	<!-- Toastr -->
	<script src="<{$config.rootUrl}>/public/libs/jqueryFill/jqueryFill.min.js"></script>

	<!-- USER ALERTS -->
	<{if isset( $userAlerts ) }>
		<{foreach item=userAlert key=key from=$userAlerts}>
			<script>
				jQuery(document).ready(function(){
					toastr.options = {
						"closeButton"   : true,
						"positionClass" : "toast-top-center",
						"progressBar"   : true
					};
					<{if $userAlert.type == "success"}>
						toastr.success( "<{$userAlert.message}>" )
					<{elseif $userAlert.type == "error"}>
						toastr.error( "<{$userAlert.message}>" )
					<{else}>
						toastr.info( "<{$userAlert.message}>" )
					<{/if}>
				});
			</script>
		<{/foreach}>
	<{/if}>


<script>
$(document).ready(function() {
	
});
</script>

