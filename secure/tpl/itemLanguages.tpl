<{if $languages && $languages|@count >0}>

	<div class="text-white pl-3" style="display: flex; gap: 0.5em;">

		<{foreach from=$languages key=key item=language}>
			
			<{if $key > 0}> | <{/if}>
			
			<{assign var=pageUrl value=null}>
			<{*if isset($config.page) && array_key_exists( $language, $config.page.locales) }>
				<{assign var=pageUrl value=$config.page.locales[ $language ].publicPageName}>
			<{/if*}>
			
			<a class="btn-link text-light text-uppercase" href="<{$config.rootUrl}>/index.php?lang=<{$key}>" <{*if $language == $config.lang}>style="text-decoration: underline;"<{/if*}> >
				<{if $language.selected}><b><{$key}></b><{else}><{$key}><{/if}>
			</a>
			
		<{/foreach}>

	</div>

<{/if}>
