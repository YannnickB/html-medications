<!doctype html>
<html lang="en">
	
<{$layouts.head}>

<body>

	<{$layouts.header}>
	
	<div class="container">
		

		<div class="my-5" style="display: flex; gap: 1em; align-items: center;">
			<h1><a href="index.php"><i class="fa fa-arrow-left"></i></a> <i class="fa fa-users"></i> / <i class="fa fa-film"></i> Users/movies</h1>
			<a href="usersMovies.php"><i class="fa fa-sync"></i></a>
		</div>
	</div>
	
	<div class="container-fluid">
		<{foreach from=$selectResults key=key item=selectResult}>
			<{include file="secure/tpl/pageIndex_Table.tpl" title=$selectResult.title data=$selectResult.data}>
		<{/foreach}>
	</div>
	
	<div class="container">
		
		<div class="row">
			<div class="col-md-6">
				<{$movieInsertFormHtml}>
			</div>
			<div class="col-md-6">
				<{if isset($userMovieUpdateFormHtml) }>
					<{$userMovieUpdateFormHtml}>
				<{/if}>
			</div>
		</div>
		
		<form id="users_movies_form" method="post">
			<div>
				<div><span>User</span> <b class="text-danger">*</b></div>
				<select name="actions[insert_users_movies][userId]" style="margin-bottom: 0.5em;">
					<{foreach from=$usersOptions key=optionKey item=option}>
						<option value="<{$option.value}>" <{if $option.selected}>selected="selected"<{/if}>><{$option.label}></option>
					<{/foreach}>
				</select>
			</div>
			<div>
				<div><span>Movie</span> <b class="text-danger">*</b></div>
				<select name="actions[insert_users_movies][movieId]" style="margin-bottom: 0.5em;">
					<{foreach from=$moviesOptions key=optionKey item=option}>
						<option value="<{$option.value}>" <{if $option.selected}>selected="selected"<{/if}>><{$option.label}></option>
					<{/foreach}>
				</select>
			</div>
			<div>
				<div><span>Comment</span></div>
				<input name="actions[insert_users_movies][userMovieComment]" maxlength="64" placeholder="Comment" value="" style="margin-bottom: 0.5em;" />
			</div>
			<div><button type="submit">Insert</button></div>
		</form>

		
		<form>
			
		</form>

	</div>

	<{$layouts.footer}>


	<{$layouts.includesBottom}>

	  
	<!--script src="<{$config.modules.exercices.resourcesUrl}>/js/pageBodyPart.js"></script-->



</body>

</html>
