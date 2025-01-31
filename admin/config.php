<?php

//
include_once "includes_by_all.php";


//
if ( isset($_POST["action"] ) ){
	//echo __FILE__. " _POST=<pre>" . json_encode($_POST, JSON_PRETTY_PRINT) . "</pre><br/>";
	if ( $_POST["action"] == "updateConfig" ){
		$tagsObject = new Configs($pdo, $_POST["ConfigId"] );
		$result = $tagsObject->update( $_POST );
		if ( $result[1] == 0)
			$userAlerts[] =  [ "title" => "", "message" => "Config updated", "type" => "success" ];
		else $userAlerts[] =  [ "title" => "", "message" => "Config not updated", "type" => "error" ];
    }
}

//
$id = $_GET["ConfigId"];
if ( $id ){

	try{
		// Get medication
		$configsObject = new Configs($pdo, $id );
		$configData = $configsObject->fetch();
		$smarty->assign( "configData", $configData );
		//echo __FILE__. " configData=<pre>" . json_encode($configData, JSON_PRETTY_PRINT) . "</pre><br/>";
	}
	catch( Exception $e){
		echo "e=$e<br>";
	}
}

//
include dirname(__DIR__) . "/header.php";

//
echo $smarty->fetch( $config["securePath"] . "/tpl/admin/pageConfig.tpl" );
