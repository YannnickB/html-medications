<!doctype html>
<html lang="en">
	
<{$layouts.head}>

<body>

	<{$layouts.header}>
	
	<div class="container">
		

		<div class="my-5" style="display: flex; gap: 1em; align-items: center;">
			<h1><a href="index.php"><i class="fa fa-arrow-left"></i></a> <i class="fa fa-users"></i> Users</h1>
			
			<a href="users.php"><i class="fa fa-sync"></i></a>
		</div>
	
		<{foreach from=$selectResults key=key item=selectResult}>
			<{include file="secure/tpl/pageIndex_Table.tpl" title=$selectResult.title data=$selectResult.data}>
		<{/foreach}>
		
		<div class="row">
			<div class="col-md-6 mb-3">
				<{$InsertFormHtml}>
			</div>
			<div class="col-md-6 mb-3">
				<{if isset($userUpdateFormHtml) }>
					<{$userUpdateFormHtml}>
				<{/if}>
			</div>
		</div>

	</div>

	<{$layouts.footer}>


	<{$layouts.includesBottom}>

	  
	<!--script src="<{$config.modules.exercices.resourcesUrl}>/js/pageBodyPart.js"></script-->

</body>

</html>
