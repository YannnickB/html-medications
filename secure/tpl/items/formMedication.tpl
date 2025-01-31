<!-- FORM -->
<form id="form" method="post" class="mb-5">
	<{if $medication}>
		<input type="hidden" class="form-control" name="action" value="updateMedication">
		<input type="hidden" class="form-control" name="MedicationId" value="<{$medication.MedicationId}>">
	<{else}>			
		<input type="hidden" class="form-control" name="action" value="insertMedication">
	<{/if}>

	<div>

		<div class="form-floating mb-3">
			<input type="text" class="form-control" name="MedicationLabel" placeholder="Label" value="<{if $medication}><{$medication.MedicationLabel}><{/if}>">
			<label for="MedicationLabel">Label</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" class="form-control" name="MedicationDescriptionShort" placeholder="Description short" value="<{if $medication}><{$medication.MedicationDescriptionShort}><{/if}>">
			<label for="MedicationDescriptionShort">Description short</label>
		</div>

		<div class="row">
			<div class="col-md-6">
				<{include file=$config.securePath|cat:"/tpl/items/formInputYesNo.tpl" label="Is natural product" value=$medication?$medication.MedicationIsNaturalProduct:0 name="MedicationIsNaturalProduct"}>
			</div>
			<div class="col-md-6">
				<{include file=$config.securePath|cat:"/tpl/items/formInputYesNo.tpl" label="Is vegetable" value=$medication?$medication.MedicationIsVegetable:0 name="MedicationIsVegetable"}>
			</div>
		</div>


		<div class="form-floating mb-3">
			<textarea class="form-control" placeholder="Description" name="MedicationDescription" style="height: 7em;"><{if $medication}><{$medication.MedicationDescription}><{/if}></textarea>
			<label for="MedicationDescription">Description</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" class="form-control" name="MedicationLogoRelativePath" placeholder="Logo relative path" value="<{if $medication}><{$medication.MedicationLogoRelativePath}><{/if}>">
			<label for="MedicationLogoRelativePath">Logo relative path</label>
		</div>
		<div class="text-end">
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> <{if $medication}>Save<{else}>Add<{/if}></button>
		</div>
	</div>
</form>