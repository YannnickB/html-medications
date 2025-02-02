<!doctype html>
<html lang="en">
	
<{$layouts.head}>

<body>

	<{$layouts.header}>
	
	<div class="container">

		<div class="py-3" style="display: flex; gap: 0em; align-items: start;">
			<div style="flex: 1;">
				<div style="display: flex; gap: 0em; align-items: center;">
					<h1>
						<a href="index.php"><i class="fa fa-arrow-left"></i></a>
						Medication - <{$medication.MedicationLabel}>
					</h1>
					<a class="btn btn-link text-decoration-none" href="medication.php?MedicationId=<{$medication.MedicationId}>"><i class="fa fa-sync"></i></a>
				</div>
				<div>
					<span>Tags</span>
					<{foreach from=$medicationsTags item=medicationTag}>
						<form id="form" method="post" class="d-inline">
							<input type="hidden" name="action" value="deleteMedicationsTags">
							<input type="hidden" name="MedicationTagId" value="<{$medicationTag.MedicationTagId}>">
							<button type="submit" class="badge bg-success"><{$medicationTag.TagLabel}></button>
						</form>
					<{/foreach}>
				</div>
			</div>
	
			<div style="display: flex; gap: 0em; align-items: center; justify-content: end;">
				<img src="<{$medication.LogoUrl}>" style="height: 7em;"></img>
			</div>
		</div>

		<div class="mb-2">
			
			<div>
				<{foreach from=$tags item=tag}>
					<form id="form" method="post" class="d-inline">
						<input type="hidden" name="action" value="insertMedicationsTags">
						<input type="hidden" name="MedicationTag_MedicationId" value="<{$medication.MedicationId}>">
						<input type="hidden" name="MedicationTag_TagId" value="<{$tag.TagId}>">
						<button type="submit" class="badge bg-secondary"><i class="fa fa-plus"></i> <{$tag.TagLabel}></button>
					</form>
				<{/foreach}>
			</div>
		</div>

		<hr/>

		<{include file=$config.securePath|cat:"/tpl/items/formMedication.tpl"}>


		

	</div>
	
	<{$layouts.footer}>

	<{$layouts.foot}>

	  
	<script src="<{$config.rootUrl}>/public/js/pageMedication.js"></script>



</body>

</html>
