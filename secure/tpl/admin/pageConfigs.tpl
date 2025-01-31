<!doctype html>
<html lang="en">
	
<{$layouts.head}>

<body>

	<{$layouts.header}>
	
	<div class="container">

		<div class="py-3" style="display: flex; gap: 0em; align-items: center;">
			<div style="flex: 1; display: flex; gap: 0em; align-items: center;">
				<h1>
					<a href="index.php"><i class="fa fa-arrow-left"></i></a>
					Admin - Configs
				</h1>
				<a class="btn btn-link text-decoration-none" href="tags.php"><i class="fa fa-sync"></i></a>
			</div>
	
			<div style="display: flex; gap: 0em; align-items: center; justify-content: end;">
				<!-- a href="tags.php"><i class="fa fa-tags"></i> Configs</a-->
			</div>
		</div>

		<div class="mb-2">
			<table class="table">
				<thead>
					<tr>
						<th>Category</th>
						<th>Name</th>
						<th>Translatable</th>
						<th>Value</th>
					</tr>
				</thead>
				<{foreach from=$tags item=config}>
					<tr>
						<td><{$config.ConfigCategory}></td>
						<td><a href="config.php?ConfigId=<{$config.ConfigId}>" class=""  style=""><{$config.ConfigName}></span></a>
						</td>
						<td><{$config.ConfigTranslatable}></td>
						<td><{$config.ConfigValue}></td>
					</tr>
				<{/foreach}>
			</table>
		</div>

	</div>

	<{$layouts.footer}>

	<{$layouts.foot}>

	  
	<script src="<{$config.rootUrl}>/public/js/pageIndex.js"></script>



</body>

</html>
