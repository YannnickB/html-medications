<!doctype html>
<html lang="en">
	
<{$layouts.head}>

<body>

	<{$layouts.header}>
	
	<div class="container">

		<div class="py-3" style="display: flex; gap: 0em; align-items: start;">
			<div style="flex: 1; display: flex; gap: 0em; align-items: center;">
				<h1>
					<a href="configs.php"><i class="fa fa-arrow-left"></i></a>
					Admin - Config - <{$configData.ConfigName}>
				</h1>
				<a class="btn btn-link text-decoration-none" href="config.php?ConfigId=<{$configData.ConfigId}>"><i class="fa fa-sync"></i></a>
			</div>
	
			<div style="display: flex; gap: 0em; align-items: center; justify-content: end;">
			</div>
		</div>

		<!-- FORM -->
		<form id="form" method="post" class="mb-2">
			<input type="hidden" class="form-control" name="action" value="updateConfig">
			<input type="hidden" class="form-control" name="ConfigId" value="<{$configData.ConfigId}>">
			
			<div class="row">

				<div class="col-md-auto">
					<div class="form-floating mb-3">
						<input type="text" class="form-control" disabled name="ConfigCategory" placeholder="Description short" value="<{$configData.ConfigCategory}>">
						<label for="ConfigCategory">Category</label>
					</div>
				</div>

				<div class="col-md-auto">
					<div class="form-floating mb-3">
						<input type="text" class="form-control" disabled name="ConfigName" placeholder="Label" value="<{$configData.ConfigName}>">
						<label for="ConfigName">Name</label>
					</div>
				</div>

				<div class="col-md-auto">
					<div class="form-floating mb-3">
						<input class="form-control" disabled placeholder="Description" name="ConfigTranslatable" value="<{$configData.ConfigTranslatable}>"></input>
						<label for="ConfigTranslatable">Translatable</label>
					</div>
				</div>

				<div class="col-md">
					<div class="form-floating mb-3">
						<input type="text" class="form-control" name="ConfigValue" placeholder="Logo relative path" value="<{$configData.ConfigValue}>">
						<label for="ConfigValue">Value</label>
					</div>
				</div>
				<div class="text-end">
					<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
				</div>
			</div>
		</form>

	</div>
	
	<{$layouts.footer}>

	<{$layouts.foot}>

	  
	<script src="<{$configData.rootUrl}>/public/js/pageMedication.js"></script>



</body>

</html>
