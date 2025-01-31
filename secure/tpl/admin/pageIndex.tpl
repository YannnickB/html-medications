<!doctype html>
<html lang="en">
	
<{$layouts.head}>

<body>

	<{$layouts.header}>
	
	<div class="container">

		<div class="py-3" style="display: flex; gap: 0em; align-items: center;">
			<div style="flex: 1; display: flex; gap: 0em; align-items: center;">
				<h1>Admin - Medications</h1>
				<a class="btn btn-link text-decoration-none" href="index.php"><i class="fa fa-sync"></i></a>
			</div>
	
			<div style="display: flex; gap: 0em; align-items: center; justify-content: end;">
			<a href="configs.php"><i class="fa fa-tags"></i> Configs</a>
			<a href="tags.php"><i class="fa fa-tags"></i> Tags</a>
			</div>
		</div>

		

		<div class="row justify-content-end g-1 py-3">
			<div class="col-auto">
				<form method="post" class="m-0 text-end">
					<div><input type="hidden" name="action" value="deleteDatabase"></input></div>
					<div><button type="submit" class="btn btn-sm btn-danger">Delete database</button></div>
				</form>
			</div>

			<div class="col-auto text-end">
				<button class="btn btn-sm btn-success" onclick="$('#insertForm').slideToggle()">Add medication</button>
			</div>
		</div>
		<div id="insertForm" style="display: none;">
			<{include file=$config.securePath|cat:"/tpl/items/formMedication.tpl"}>
		</div>


		<div class="mb-2">
			<div class="list-group">
				<{foreach from=$medications item=medication}>
					<div class="list-group-item list-group-item-action" style="display: flex; gap: 1em;">
						<a href="medication.php?MedicationId=<{$medication.MedicationId}>" style="flex: 1; display: flex; gap: 1em;">
							<span style="flex: 1;"><{$medication.MedicationLabel}></span>
							<img src="<{$medication.LogoUrl}>" style="height: 3em;"></img>
						</a>
						<form method="post">
							<input type="hidden" class="form-control" name="action" value="deleteMedication">
							<input type="hidden" class="form-control" name="MedicationId" value="<{$medication.MedicationId}>">
							<button type="submit">Delete</button>
						</form>
					</div>
				<{/foreach}>
			</div>
		</div>

	</div>

	<{$layouts.footer}>

	<{$layouts.foot}>

	  
	<script src="<{$config.rootUrl}>/public/js/pageIndex.js"></script>



</body>

</html>
