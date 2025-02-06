<?php

// Include head
include_once $config["rootPath"] . "/header.inc.php";

echo $smarty->fetch( $config["templatesPath"]."/pageDefaultFooter.tpl" );
