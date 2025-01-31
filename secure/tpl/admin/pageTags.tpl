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
					Admin - Tags
				</h1>
				<a class="btn btn-link text-decoration-none" href="tags.php"><i class="fa fa-sync"></i></a>
			</div>
	
			<div style="display: flex; gap: 0em; align-items: center; justify-content: end;">
				<!-- a href="tags.php"><i class="fa fa-tags"></i> Tags</a-->
			</div>
		</div>

		<div class="mb-2">
			<div class="list-group">
				<{foreach from=$tags item=tag}>
					<a href="tag.php?TagId=<{$tag.TagId}>" class="list-group-item list-group-item-action"  style="display: flex; gap: 1em;">
						<span style="flex: 1;"><{$tag.TagLabel}></span>
					</a>
				<{/foreach}>
			</div>
		</div>

	</div>

	<{$layouts.footer}>

	<{$layouts.foot}>

	  
	<script src="<{$config.rootUrl}>/public/js/pageIndex.js"></script>



</body>

</html>
