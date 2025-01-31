<b><{$title}></b>
<{if $data}>
	<table class="table table-bordered table-hover table-sm mb-3">
		<thead>
			<tr>
				<{foreach from=$data[0] key=columnKey item=column}>
					<th><{$columnKey}></th>
				<{/foreach}>
			</tr>
		</thead>
		<tbody>
			<{foreach from=$data key=key item=row}>
				<tr>
					<{foreach from=$row key=columnKey item=column}>
						<td><{$column}></td>
					<{/foreach}>
				</tr>
			<{/foreach}>
		</tbody>
	</table>
<{/if}>
