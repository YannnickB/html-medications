<?php

/** */
function headerGenerateHeadLayout( $page, $lang ){
	global $privateConfig, $config, $cmsPage, $siteMap, $smarty, $layouts, $locales;
	//echo "headerGenerateHeadLayout() $lang<br/>";
	//echo "headerGenerateHeadLayout() privateConfig: <pre>"; print_r($privateConfig); echo "</pre>";
	//echo "<br><br><br><br><br>" . __FILE__ . " headerGenerateHeadLayout() layouts: <pre>" . json_encode($layouts, JSON_PRETTY_PRINT) . "</pre><br/>";
	//echo "headerGenerateHeadLayout() cmsPage: <pre>"; print_r($cmsPage); echo "</pre>";

	// Reload config in smarty
	$smarty->assign('config', $config );
	$smarty->assign('locales', $locales );
	//$smarty->assign('cmsPage', $cmsPage );
	
	// Fetch template
	//$layouts["head"] = $smarty->fetch( $privateConfig["templatesPath"] . "/head.tpl" );
	
	//
	$layouts["head"] = $smarty->fetch( $config["templatesPath"] . "/head.tpl" );
}


/** */
function headerGenerateFootLayout(){
	global $config, $smarty, $layouts, $userAlerts;
	$smarty->assign( "userAlerts", $userAlerts );
	$layouts["foot"] = $smarty->fetch( $config["templatesPath"] . "/foot.tpl" );
	
	$smarty->assign('layouts', $layouts );
	$smarty->assign('userAlerts', $userAlerts );
}









/** */
function headerGenerateAdminHeaderLayout(){
	global $config, $smarty, $layouts, $locales;
	//echo "headerGenerateAdminHeaderLayout()<br/>";
	
	// Fetch template
	$layouts["adminHeader"] = $smarty->fetch( $config["templatesPath"] . "/adminHeader.html" );
	
	//
	$smarty->assign('layouts', $layouts );
	$smarty->assign('locales', $locales );
}




/** */
function headerGenerateHeaderLayout( $page, $lang ){
	global $privateConfig, $config, $siteMap, $smarty, $layouts, $locales, $globalUser, $globalMenus, $globalLanguages;
	//echo "headerGenerateHeaderLayout() $lang<br/>";
	//echo "headerGenerateHeaderLayout() <pre>"; print_r($config); echo "</pre>";
	//echo __FILE__ . __LINE__ . " headerGenerateHeaderLayout() globalUser: <pre>"; print_r($globalUser); echo "</pre>";
	//echo __FILE__ . __LINE__ . " headerGenerateHeaderLayout() globalLanguages: <pre>"; print_r($globalLanguages); echo "</pre>";

	//loadLocales( $lang );
	//configFillSiteMap( $lang, "headerGenerateHeaderLayout()" );
	//configSetCurrentPage( $page );
	//echo "headerGenerateHeaderLayout() lang: $lang <pre>"; print_r($config["page"]["anchors"]); echo "</pre>";

	// Reload config in smarty
	//$smarty->assign('privateConfig', $privateConfig );
	$smarty->assign('config', $config );
	//$smarty->assign('globalUser', $globalUser );
	//$smarty->assign('languages', $config["languages"] );
	//$smarty->assign('globalMenus', $globalMenus );
	//$smarty->assign('siteMap', $siteMap );
	
	// Fetch template
	//$layouts["header"] = $smarty->fetch( $privateConfig["templatesPath"] . "/header.tpl" );
	
	//
	$layouts["header"] = $smarty->fetch( $config["templatesPath"] . "/header.tpl" );

	//
	//echo $layouts["header"];
	$smarty->assign('layouts', $layouts );
}


/** */
function headerGenerateFooterLayout(){
	global $config, $siteMap, $smarty, $layouts;
	//echo "headerGenerateFooterLayout() resourcesUrl: ".$config["resourcesUrl"]."<br/>";

	// Reload config in smarty
	$smarty->assign('config', $config );
	$smarty->assign('siteMap', $siteMap );
	
	// Fetch template
	$layouts["footer"] = $smarty->fetch( $config["templatesPath"] . "/footer.tpl" );

	$smarty->assign('layouts', $layouts );
}


/** */
function headerLoadBreadcrumbs(){
	global $config, $siteMap;
	//echo "headerLoadBreadcrumbs()<br/>";
	$breadcrumbs = array();
	//echo "<br/><br/><br/><br/><br/>". __FILE__. " config.page<pre>"; print_r($config["page"]); echo "</pre>";
	if ( isset( $config["page"] ) ){
		if ( isset( $config["page"]["id"] ) ){

			$currentItemId = $config["page"]["id"];
			$currentItem = array_merge( array( "id" => $currentItemId, "current" => true ), $siteMap[ $currentItemId ]["texts"] );
			$breadcrumbs[] = $currentItem;
			
			foreach( $config["page"]["parentIds"] as $key => $id ){
				//echo "<pre>"; print_r($siteMap[ $id ]["texts"]); echo "</pre>";
				//echo "headerLoadBreadcrumbs() $key. id: " . $id . "<br/>";
				$item = array_merge( array( "id" => $id, "current" => false ), $siteMap[ $id ]["texts"] );
				array_unshift($breadcrumbs, $item);
			}
		}
	}
	$config["breadcrumbs"] = $breadcrumbs;
}

?>


