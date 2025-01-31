<!doctype html>
<html lang="en">
	
<{$layouts.head}>

<body>

	<{$layouts.header}>
	
	<div class="container">

		<div class="py-3" style="display: flex; gap: 0em; align-items: start;">
			<div style="flex: 1; display: flex; gap: 0em; align-items: center;">
				<h1>
					<a href="tags.php"><i class="fa fa-arrow-left"></i></a>
					Admin - Tag - <{$tag.TagLabel}>
				</h1>
				<a class="btn btn-link text-decoration-none" href="tag.php?TagId=<{$tag.TagId}>"><i class="fa fa-sync"></i></a>
			</div>
	
			<div style="display: flex; gap: 0em; align-items: center; justify-content: end;">
				<img src="<{$medication.IllustrationUrl}>" style="height: 7em;"></img>
			</div>
		</div>

		<div class="mb-2" style="display: flex; gap: 1em;">
			<div>
				<{foreach from=$medicationsTags item=medicationTag}>
					<span class="badge bg-success"><{$medicationTag.MedicationLabel}></span>
				<{/foreach}>
			</div>
			<div>
				<{foreach from=$medications item=medication}>
					<form id="form" method="post" class="d-inline">
						<input type="hidden" class="form-control" name="action" value="insertMedicationsTags">
						<input type="hidden" class="form-control" name="MedicationTag_MedicationId" value="<{$medication.MedicationId}>">
						<input type="hidden" class="form-control" name="MedicationTag_TagId" value="<{$tag.TagId}>">
						<button type="submit" class="badge bg-secondary"><i class="fa fa-plus"></i> <{$medication.MedicationLabel}></button>
					</form>
				<{/foreach}>
			</div>
		</div>

		<hr/>

		<!-- FORM -->
		<form id="form" method="post" class="mb-2">
			<input type="hidden" class="form-control" name="action" value="updateTag">
			<input type="hidden" class="form-control" name="TagId" value="<{$tag.TagId}>">
			
			<div>

				<div class="form-floating mb-3">
					<input type="text" class="form-control" name="TagLabel" placeholder="Label" value="<{$tag.TagLabel}>">
					<label for="TagLabel">Label</label>
				</div>
				<div class="form-floating mb-3">
					<input type="text" class="form-control" name="TagDescriptionShort" placeholder="Description short" value="<{$tag.TagDescriptionShort}>">
					<label for="TagDescriptionShort">Description short</label>
				</div>
				<div class="form-floating mb-3">
					<textarea class="form-control" placeholder="Description" name="TagDescription" style="height: 7em;"><{$tag.TagDescription}></textarea>
					<label for="TagDescription">Description</label>
				</div>
				<div class="form-floating mb-3">
					<input type="text" class="form-control" name="TagIllustrationRelativePath" placeholder="Logo relative path" value="<{$tag.TagIllustrationRelativePath}>">
					<label for="TagIllustrationRelativePath">Logo relative path</label>
				</div>
				<div class="text-end">
					<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
				</div>
			</div>
		</form>

	</div>
	
	<{$layouts.footer}>

	<{$layouts.foot}>

	  
	<script src="<{$config.rootUrl}>/public/js/pageMedication.js"></script>



</body>

</html>
