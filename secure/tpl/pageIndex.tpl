<div class="container">

	<!-- PAGE HEADE -->
	<div class="py-3" style="display: flex; gap: 0em; align-items: center;">
		<div style="flex: 1; display: flex; gap: 0em; align-items: center;">
			<h1><{$locales.app_name}></h1>
			<a class="btn btn-link text-decoration-none" href="index.php"><i class="fa fa-sync"></i></a>
		</div>

		<div style="display: flex; gap: 0em; align-items: center; justify-content: end;">
		</div>
	</div>

	<!-- FILTERS FORM -->
	<!--pre><{json_encode($filters)}></pre-->
	<form>
		<div class="row">
			<div class="col-auto d-flex gap-2 align-items-center">
				<span>Text:</span> <input type="text" name="q" class="form-control" value="<{if isset($filters.q)}><{$filters.q}><{/if}>"></input>
			</div>
			<div class="col-auto d-flex gap-2 align-items-center">
				<span class="text-nowrap">Natural product:</span> 
				<select type="text" name="MedicationIsNaturalProduct" class="form-control">
					<option value="">----</option>
					<option value="1" <{if isset(  $filters.MedicationIsNaturalProduct ) && $filters.MedicationIsNaturalProduct==1}>selected="selected"<{/if}>>Yes</option>
					<option value="0" <{if isset(  $filters.MedicationIsNaturalProduct ) && $filters.MedicationIsNaturalProduct===0}>selected="selected"<{/if}>>No</option>
				</select>
			</div>
			<div class="col-auto">
				<button type="submit" class="btn btn-primary">Filter</button>
			</div>
		</div>
	</form>

	<{include file=$config.securePath|cat:"/tpl/pageIndex_Medications.tpl" data=$medications}>

</div>

<script src="<{$config.rootUrl}>/public/js/pageIndex.js"></script>
