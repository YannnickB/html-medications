<?php

//echo "<br/><br/><br/><br/><br/><br/>" . __FILE__ . __LINE__ . " <span>Includes Smarty</span>";
//echo "<br/><br/><br/><br/><br/><br/>" . __FILE__ . __LINE__ . " config=<pre>"; print_r( $config ); echo "</pre><br/>";

$config["templatesPath"] = $config["securePath"] . "/tpl";

//require_once $config["rootPath"] . '/vendor/smarty/smarty/src/Smarty.php';
require $config["securePath"] . "/class/globalSmarty.php";


// INIT SMARTY
global $smarty;
$smarty = initSmarty();
$smarty->assign('config', $config );
$smarty->assign('locales', $locales );


global $globalSmarty;
$globalSmarty = new globalSmarty( $config["rootPath"], $config["securePath"] . "/tpl", $config["securePath"] . "/caches/smarty", $config["rootPath"] . "/themes", "default" );


/** */
function initSmarty(){
	global $config;
	//echo "initSmarty<br/>";
	if ( isset( $config["securePath"] ) ){
		
		$smarty = new Smarty\Smarty();	

		$smarty->setTemplateDir('');
		
		//echo "initSmarty() securePath: " . $config["securePath"] . "<br/>";
		$smarty->setCompileDir( $config["securePath"] . "/caches/smarty/templates_c" );
		$smarty->setCacheDir(   $config["securePath"] . "/caches/smarty/cache"       );
		$smarty->setConfigDir(  $config["securePath"] . "/caches/smarty/configs"     );
	
		$smarty->setLeftDelimiter("<{");
		$smarty->setRightDelimiter("}>");
		
		return $smarty;
	}
	return null;
}
