<?php

// Set templates path


// INIT SMARTY
global $smarty;
$smarty = initSmarty( $config["securePath"] );

// Assign config
$smarty->assign('config', $config );
// Assign locales
$smarty->assign('locales', $locales );
// Assign locales
$smarty->assign('languages', $globalLanguages );



/** */
function initSmarty( $securePath ){

	if ( !$securePath ) return null;

	// Init smarty
	$smarty = new Smarty\Smarty();	

	//
	$smarty->setTemplateDir('');
	
	//
	$smarty->setCompileDir( "$securePath/caches/smarty/templates_c" );
	$smarty->setCacheDir(     "$securePath/caches/smarty/cache"       );
	$smarty->setConfigDir(   "$securePath/caches/smarty/configs"     );

	//
	$smarty->setLeftDelimiter("<{");
	$smarty->setRightDelimiter("}>");
	
	return $smarty;
}
