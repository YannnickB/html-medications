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
	
			<div style="display: flex; gap: 1em; align-items: center; justify-content: end;">
				<form method="post" class="m-0 text-end">
					<div><input type="hidden" name="action" value="backupDatabase"></input></div>
					<div><button type="submit" class="btn btn-sm btn-success">Backup database</button></div>
				</form>
				<form method="post" class="m-0 text-end">
					<div><input type="hidden" name="action" value="deleteDatabase"></input></div>
					<div><button type="submit" class="btn btn-sm btn-danger">Delete database</button></div>
				</form>
				<a href="configs.php"><i class="fa fa-tags"></i> Configs</a>
				<a href="tags.php"><i class="fa fa-tags"></i> Tags</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-auto">
				<h2>Tags</h2>
				<div class="list-group mb-3">
					<{foreach from=$tags item=tag}>
						<div class="list-group-item list-group-item-action py-0 pe-0" style="display: flex; gap: 1em;">
							<a href="tag.php?TagId=<{$tag.TagId}>" class=""  style="flex: 1;">
								<span style="flex: 1;"><{$tag.TagLabel}></span>
							</a>
							<form method="post">
								<input type="hidden" class="form-control" name="action" value="deleteTag">
								<input type="hidden" class="form-control" name="TagId" value="<{$tag.TagId}>">
								<button type="submit" class="btn btn-danger"><i class="fa fa-times"></i></button>
							</form>
						</div>
					<{/foreach}>
				</div>
			</div>
			<div class="col-md">
				<div class="d-flex align-items-center gap-3">
					<h2 class="flex-fill">Medications</h2>
					<button class="btn btn-sm btn-success" onclick="$('#insertForm').slideToggle()">Add medication</button>
				</div>
				
				<div id="insertForm" style="display: none;">
					<{include file=$config.securePath|cat:"/tpl/items/formMedication.tpl"}>
				</div>

				<div class="list-group mb-3">
					<{foreach from=$medications item=medication}>
						<div class="list-group-item list-group-item-action p-0">
							<div class="row">
								<div class="col-1 rounded" style="background-image: url('<{$medication.LogoUrl}>'); background-position: center; background-size: cover;"></div>
								<a href="medication.php?MedicationId=<{$medication.MedicationId}>" class="col d-flex align-items-center">
									<span style="flex: 1;"><{$medication.MedicationLabel}></span>
								</a>
								<form method="post" class="col-auto">
									<input type="hidden" class="form-control" name="action" value="deleteMedication">
									<input type="hidden" class="form-control" name="MedicationId" value="<{$medication.MedicationId}>">
									<button type="submit" class="btn btn-danger"><i class="fa fa-times"></i></button>
								</form>
							</div>
						</div>
					<{/foreach}>
				</div>
			</div>
		</div>

	</div>

	<{$layouts.footer}>

	<{$layouts.foot}>

	  
	<script src="<{$config.rootUrl}>/public/js/pageIndex.js"></script>



</body>

</html>
