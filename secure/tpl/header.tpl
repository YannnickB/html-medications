<div class="shadow bg-light text-dark">
	
	<div id="topToolbar" class="top-toolbar bg-dark text-light">
		<div class="container py-1">
			<div class="row">
				<div class="col">
				</div>
				<div class="col-auto text-right" style="font-size: 0.85rem;">
					<div class="d-flex">
						<div class="d-flex">&nbsp;</div>
						<div class="">
							<{include file=$config.templatesPath|cat:"/itemLanguages.tpl" languages=$languages}>
						</div>
					</div>
				</div>
				
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	
	<!-- FULL SCREEN MENU -->
	<div id="full-screen-layout" class="full-screen-layout" style="display: none;">
		
		<div class="full-screen-layout-toggle-button" data-target="full-screen-layout"><span class="fa fa-times"></span></div>
		
		<div class="full-screen-layout-links">
			<{foreach item=anchor key=key from=$config.page.anchors}>
				<{if $key < 10}>
					<a class="full-screen-layout-link" href="<{$anchor.value}>">
						<{if $anchor.icon_css}><span class="<{$anchor.icon_css}> d-none d-sm-inline"></span> <{/if}>
						<{$anchor.text.text}>
					</a>
				<{/if}>
			<{/foreach}>
			<{foreach item=page key=key from=$config.page.children}>
				<{if $key < 10 && $page.visibleInPagesList && $page.visible_in_main_navbar}>
					<a class="full-screen-layout-link" href="<{$page.texts.publicPageName}>">
						<{if $page.icon_css}><span class="<{$page.icon_css}> d-none d-sm-inline"></span> <{/if}>
						<{$page.texts.label}>
					</a>
				<{/if}>
			<{/foreach}>
		</div>
	</div>

	<!-- NAVBAR -->
	<nav class="main-navbar">
		<div class="container">
			<div style="display: flex;">

				<div class="main-navbar-start" style="flex: 1;">
					<a class="main-navbar-start-logo-link" href="<{$config.rootUrl}>/index.php">
						<h1 class="my-2">
							<small><{$locales.app_name}></small>
						</h1>
					</a>
					
					<!--button class="full-screen-layout-toggle-button navbar-toggler" data-target="full-screen-layout">
						<span class="fa fa-bars"></span>
					</button-->
				</div>

				<div class="main-navbar-end"  style="display: flex; align-items: center; gap: 1em;">
					
					<a href="<{$config.rootUrl}>/index.php"><span class="fa fa-home"></span> Home</a>
					<a href="<{$config.rootUrl}>/index.html" target="_blank"><span class="fa fa-info-circle"></span> HTML</a>
					<a href="<{$config.rootUrl}>/admin" target="_blank"><span class="fa fa-info-circle"></span> Admin</a>
					<!--a href="<{$config.rootUrl}>/sound.php"><i class="fa-solid fa-wave-square"></i> Son</a>
					<a href="<{$config.rootUrl}>/note.php"><i class="fa fa-music"></i> Note</a>
					<a href="<{$config.rootUrl}>/intervals.php"><i class="fa-solid fa-arrows-left-right"></i> Intervals</a>
					<a href="<{$config.rootUrl}>/chords.php"><i class="fa fa-music"></i> Chords</a>
					<a href="<{$config.rootUrl}>/guitar.php"><i class="fa-solid fa-guitar"></i> Guitar</a-->
					
					
					<{if $globalMenus}>
						<{foreach from=$globalMenus.navbar.items key=itemKey item=item}>
							<div onmouseover="$('#navbarSubItems<{$itemKey}>').show();" onmouseleave="$('#navbarSubItems<{$itemKey}>').hide();">
								<a href="<{$item.url}>" target="<{$item.menu_item_url_target}>"><i class="<{$item.displayMenuItemIconCssClass}>"></i> <{$item.label}></a>
								<{if isset($item.items)}>
									<div id="navbarSubItems<{$itemKey}>" style="display: none; position: absolute;">
										<{foreach from=$item.items key=subItemKey item=subItem}>
											<div><a href="<{$subItem.url}>"><i class="<{$subItem.displayMenuItemIconCssClass}>"></i> <{$subItem.label}></a></div>
										<{/foreach}>
									</div>
								<{/if}>
							</div>
						<{/foreach}>
					<{/if}>
					
					<!--div class="">
						<a href="admin" target="_blank"><span class="fa fa-lock"></span> Admin</a>
					</div-->

					<{*include file=$config.rootPath|cat:"/tpl/item_header_social_networks.tpl" networks=$locales.social_networks*}>
					
				</div>
				
			</div>
			
		</div>
		
	</nav>

</div>
	
<div class="main-navbar-padding"></div>