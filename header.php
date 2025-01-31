<?php

//echo "<br/><br/><br/><br/><br/><br/>";
//echo "<h1>Header include</h1>";

// Header functions
include_once ( $config["rootPath"] . "/head.php");

//
$smarty->assign('config', $config );
//$smarty->assign('locales', $locales );


//
headerLoadBreadcrumbs();


//

//
//$layouts["head"] = null;


//
headerGenerateAdminHeaderLayout();

//
$layouts["header"] = null;
headerGenerateHeaderLayout(isset( $config["page"] ) ? $config["page"] : null, $config["lang"]);

//
$layouts["footer"] = null;
headerGenerateFooterLayout();
