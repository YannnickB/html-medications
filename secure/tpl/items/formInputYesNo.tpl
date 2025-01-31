
<div class="form-floating mb-3">
	
	<select class="form-select" name="<{$name}>" aria-label="Floating label select example">
		
		<option value="1" <{if $value==1}>selected="selected"<{/if}>>Yes</option>
		<option value="0" <{if $value!=1}>selected="selected"<{/if}>>No</option>

	</select>
	
	<label for="floatingSelect"><{$label}></label>

</div>