<!doctype html>
<html lang="en">
	
<{$layouts.head}>

<body>

	<{$layouts.header}>
	
	<div class="container">

		<div class="py-3" style="display: flex; gap: 0em; align-items: center;">
			<div style="flex: 1; display: flex; gap: 0em; align-items: center;">
				<h1><{$locales.app_name}></h1>
				<a class="btn btn-link text-decoration-none" href="index.php"><i class="fa fa-sync"></i></a>
			</div>
	
			<div style="display: flex; gap: 0em; align-items: center; justify-content: end;">
			</div>
		</div>

		<!-- LIST -->
		<div id="list" class="pb-3" fill-items-template="listWithTemplateRowTemplate">
			<table border="1">
				<thead style="text-align: left;"></thead>
				<tbody></tbody>
				<tfoot style="text-align: left;"></tfoot>
			</table>
		</div>

	</div>

	<!-- TEMPLATES -->
	<div style="display: none">
		<!-- ITEM TEMPLATE -->
		<div id="listWithTemplateRowTemplate" class="border d-block text-decoration-none">
			<div class="px-2" style="display: flex; gap: 1em;">

				<div style="flex: 1;">
					<div style="display: flex; gap: 0.5em;">
						<b class="MedicationLabel"></b>
						<span class="MedicationIsNaturalProduct_on text-success"><span class="fa fa-leaf" title="Natural product"></span></span>
						<span class="MedicationIsVegetable_on text-warning"><span class="fa fa-carrot" title="Vegetable"></span></span>
					</div>
					<p class="MedicationDescriptionShort"></p>
				</div>


				<div>
					<img class="LogoUrl my-2" fill-type="backgroundImage" style="height: 3em;"></img>
				</div>

				<!--div style="display: flex;">
					<div class="clickable" fill-key="MedicationId" fill-click-action="view" title="View">View</div>
				</div-->
			</div>
		</div>

	</div>
	
	<{$layouts.footer}>

	<{$layouts.foot}>

	  
	<script src="<{$config.rootUrl}>/public/js/pageIndex.js"></script>



</body>

</html>
