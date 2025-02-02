<!-- FORM -->
<form id="form" method="post" class="mb-5">
	<{if $medication}>
		<input type="hidden" class="form-control" name="action" value="updateMedication">
		<input type="hidden" class="form-control" name="MedicationId" value="<{$medication.MedicationId}>">
	<{else}>			
		<input type="hidden" class="form-control" name="action" value="insertMedication">
	<{/if}>

	<div>

		<div class="row">
			<div class="col-md-2">
				<div class="form-floating mb-3">
					<input type="text" class="form-control" name="MedicationLabel" placeholder="Label" value="<{if $medication}><{$medication.MedicationLabel}><{/if}>">
					<label for="MedicationLabel">Label</label>
				</div>
			</div>
			<div class="col-md">
				<div class="form-floating mb-3">
					<input type="text" class="form-control" name="MedicationDescriptionShort" placeholder="Description short" value="<{if $medication}><{$medication.MedicationDescriptionShort}><{/if}>">
					<label for="MedicationDescriptionShort">Description short</label>
				</div>
			</div>
			<div class="col-md-2">
				<{include file=$config.securePath|cat:"/tpl/items/formInputYesNo.tpl" label="<i class='fa fa-leaf'></i> Is natural product" value=$medication?$medication.MedicationIsNaturalProduct:0 name="MedicationIsNaturalProduct"}>
			</div>
			<div class="col-md-2">
				<{include file=$config.securePath|cat:"/tpl/items/formInputYesNo.tpl" label="<i class='fa fa-carrot'></i> Is vegetable" value=$medication?$medication.MedicationIsVegetable:0 name="MedicationIsVegetable"}>
			</div>
		</div>

		<div class="form-floating mb-3">
			<input type="text" class="form-control" name="MedicationLogoRelativePath" placeholder="Logo relative path" value="<{if $medication}><{$medication.MedicationLogoRelativePath}><{/if}>">
			<label for="MedicationLogoRelativePath">Logo relative path</label>
		</div>

		<div class="form-floating mb-3">
			<textarea class="form-control" placeholder="Description" name="MedicationDescription" style="height: 7em;"><{if $medication}><{$medication.MedicationDescription}><{/if}></textarea>
			<label for="MedicationDescription">Description</label>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-floating mb-3">
					<textarea class="form-control" placeholder="Description" name="MedicationBenefits" style="height: 15em;"><{if $medication}><{$medication.MedicationBenefits}><{/if}></textarea>
					<label for="MedicationBenefits"><i class="fa fa-check text-success"></i> Benefits</label>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-floating mb-3">
					<textarea class="form-control" placeholder="Description" name="MedicationIngredients" style="height: 15em;"><{if $medication}><{$medication.MedicationIngredients}><{/if}></textarea>
					<label for="MedicationIngredients"><i class="fa fa-carrot"></i> Ingredients</label>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-floating mb-3">
					<textarea class="form-control" placeholder="Description" name="MedicationNutritionalValue" style="height: 15em;"><{if $medication}><{$medication.MedicationNutritionalValue}><{/if}></textarea>
					<label for="MedicationNutritionalValue"><i class="fa fa-drumstick-bite"></i> Nutritional value</label>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-floating mb-3">
					<textarea class="form-control" placeholder="Description" name="MedicationWarning" style="height: 15em;"><{if $medication}><{$medication.MedicationWarning}><{/if}></textarea>
					<label for="MedicationWarning"><i class="fa fa-skull-crossbones"></i> Warning</label>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-floating mb-3">
					<textarea class="form-control" placeholder="Description" name="MedicationAdministeringMethod" style="height: 15em;"><{if $medication}><{$medication.MedicationAdministeringMethod}><{/if}></textarea>
					<label for="MedicationAdministeringMethod"><i class="fa-solid fa-user-doctor"></i> Administering method</label>
				</div>
			</div>
		</div>
		
		<div class="text-end">
			<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> <{if $medication}>Save<{else}>Add<{/if}></button>
		</div>
	</div>
</form>