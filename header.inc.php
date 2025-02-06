<?php

// Include head
include_once $config["rootPath"] . "/head.inc.php";


//
headerLoadBreadcrumbs();


//
$layouts["adminHeader"] = null;
headerGenerateAdminHeaderLayout( $config["templatesPath"] );

//
$layouts["header"] = null;
headerGenerateHeaderLayout($config["templatesPath"] );


//
$layouts["footer"] = null;
headerGenerateFooterLayout( $config["templatesPath"] );



/** */
function headerGenerateAdminHeaderLayout( $templatesPath ){
	global $smarty, $layouts;
	//echo "headerGenerateAdminHeaderLayout()<br/>";
	
	// Fetch template
	$layouts["adminHeader"] = $smarty->fetch( "$templatesPath/adminHeader.html" );
	
	// Reassign layouts
	$smarty->assign('layouts', $layouts );
	//$smarty->assign('locales', $locales );
}


/** */
function headerGenerateHeaderLayout( $templatesPath ){
	global $smarty, $layouts;	
	// Fetch template
	$layouts["header"] = $smarty->fetch( "$templatesPath/header.tpl" );

	// Reassign layouts
	$smarty->assign('layouts', $layouts );
}

/** */
function headerGenerateFooterLayout( $templatesPath ){
	global $smarty, $layouts;
	
	// Fetch template
	$layouts["footer"] = $smarty->fetch( "$templatesPath/footer.tpl" );

	// Reassign layouts
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
			$currentItem = array_merge( [ "id" => $currentItemId, "current" => true ], $siteMap[ $currentItemId ]["texts"] );
			$breadcrumbs[] = $currentItem;
			
			foreach( $config["page"]["parentIds"] as $key => $id ){
				//echo "<pre>"; print_r($siteMap[ $id ]["texts"]); echo "</pre>";
				//echo "headerLoadBreadcrumbs() $key. id: " . $id . "<br/>";
				$item = array_merge( [ "id" => $id, "current" => false ], $siteMap[ $id ]["texts"] );
				array_unshift($breadcrumbs, $item);
			}
		}
	}
	$config["breadcrumbs"] = $breadcrumbs;
}

?>


