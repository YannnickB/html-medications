<?php

//
global $layouts;
$layouts = [];

// Header functions
//include_once $config["rootPath"] . "/header.inc.php";

//
$layouts["head"] = null;
headerGenerateHeadLayout( $config["templatesPath"] );

//
$layouts["foot"] = null;
headerGenerateFootLayout( $config["templatesPath"]);




/** */
function headerGenerateHeadLayout( $templatesPath ){
	global $smarty, $layouts;
	// Fetch template
	$layouts["head"] = $smarty->fetch( "$templatesPath/head.tpl" );
	
	// Reassign layouts
	$smarty->assign('layouts', $layouts );
}



/** */
function headerGenerateFootLayout( $templatesPath ){
	global $smarty, $layouts, $userAlerts;
	
	// Assign user alerts
	$smarty->assign( "userAlerts", $userAlerts );

	// Fetch template
	$layouts["foot"] = $smarty->fetch( $templatesPath . "/foot.tpl" );
	
	// Reassign layouts
	$smarty->assign('layouts', $layouts );
}
