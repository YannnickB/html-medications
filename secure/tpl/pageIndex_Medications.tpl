<b><{$title}></b>
<{if $data}>
	
	<div class="text-end"><{count($data)}> result(s)</div>
	
	<div class="pb-3">
		<{foreach from=$data key=columnKey item=item}>
			<div class="border p-3">
				
				<div style="display: flex; gap: 0.5em;">
					<h5 class="MedicationLabel" style="flex: 1;"><{$item.MedicationLabel}></h5>
					<{if $item.MedicationIsVegetable}>
						<h5 class="MedicationIsVegetable_on text-warning"><span class="fa fa-carrot" title="Vegetable"></span></h5>
					<{/if}>
					<{if $item.MedicationIsNaturalProduct}>
						<h5 class="MedicationIsNaturalProduct_on text-success"><span class="fa fa-leaf" title="Natural product"></span></h5>
					<{/if}>
				</div>

				<div class="row">

					<div class="col-6 offset-3 offset-md-0 col-md-2 mb-4">
						<a href="<{$item.LogoUrl}>" target="_blank"><img class="w-100 rounded border bg-light" src="<{$item.LogoUrl}>"></a>
					</div>

					<div class="col-md-10">
						<{if $item.MedicationDescriptionShort}>
							<p class="MedicationDescriptionShort"><{$item.MedicationDescriptionShort}></p>
						<{/if}>
						<{if $item.MedicationDescription}>
							<p class="MedicationDescription"><small><{$item.MedicationDescription}></small></p>
						<{/if}>

						<{if $item.MedicationBenefits}>
							<div class="mb-2">
								<b class="mb-2"><span class="fa fa-check text-success"></span> Bienfaits</b>
								<div class="">
									<div class="benefits card-body"><{$item.MedicationBenefits}></div>
								</div>
							</div>
						<{/if}>

						<{if $item.MedicationNutritionalValue}>
							<div class="mb-2">
								<b class="mb-2 "><i class="fa fa-drumstick-bite"></i> Valeur nutritionelle</b>
								<div class="">
									<div class="nutritionalValue card-body"><{$item.MedicationNutritionalValue}></div>
								</div>
							</div>
						<{/if}>

						<{if $item.MedicationIngredients}>
							<div class="mb-2">
								<b><i class="fa fa-carrot"></i> Ingredients</b>
								<p class="card-text mx-4"><{$item.MedicationIngredients}></p>
							</div>
						<{/if}>

						<{if $item.MedicationWarning}>
							<div class="mb-2">
								<b><i class="fa fa-skull-crossbones"></i> Warning</b>
								<p class="card-text mx-4"><{$item.MedicationWarning}></p>
							</div>
						<{/if}>

						<{if $item.MedicationAdministeringMethod}>
							<div class="mb-2">
								<b><i class="fa-solid fa-user-doctor"></i> Administering method</b>
								<p class="card-text mx-4"><{$item.MedicationAdministeringMethod}></p>
							</div>
						<{/if}>

					</div>
				</div>

				<!--div style="display: flex;">
					<div class="clickable" fill-key="MedicationId" fill-click-action="view" title="View">View</div>
				</div-->
			</div>
		<{/foreach}>
	</div>

<{/if}>
