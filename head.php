<?php

//echo "<br/><br/><br/><br/><br/><br/>";
//echo "<h1>Header include</h1>";

//
global $layouts;
$layouts = [];

// Header functions
include_once ( $config["rootPath"] . "/header.inc.php");

//
$smarty->assign('config', $config );
//$smarty->assign('locales', $locales );

//
$layouts["head"] = null;
headerGenerateHeadLayout( isset( $config["page"] ) ? $config["page"] : null, $config["lang"]);
headerGenerateFootLayout( isset( $config["page"] ) ? $config["page"] : null, $config["lang"]);


//
//headerGenerateHeadPrintLayout();
//headerGenerateBottomIncludesPrintLayout( isset( $config["page"] ) ? $config["page"] : null, $config["lang"]);
