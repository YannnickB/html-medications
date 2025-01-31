<?php

global $globalLanguages;

$globalLanguages = array();
if ( isset( $config["securePath"] ) ){
	//
	foreach ( $globalLanguages as $code => $language ){ 	
		//echo __FILE__ . " line " . __LINE__ . " language=<pre>"; print_r($language); echo "</pre>";
		$config["LanguagesCodes"][] = $code;
	}
}

//echo "config-server.php serverConfig: <pre>"; print_r($serverConfig); echo "</pre>";


// MERGE INIT CONFIG WITH CONFIG
//$config = array_merge( $config, $serverConfig );
//$config["languages"] = $globalLanguages;

//echo "<br/><br/><br/><br/><br/><br/>";
//echo "<h1>User include</h1>";
//echo "<pre>"; print_r($_POST); echo "</pre>";
//echo "<pre>"; print_r($_SERVER); echo "</pre>";
//echo "<pre>"; print_r($config); echo "</pre>";




//
//global $globalLanguages;
$globalLanguages = configLoadLanguages( $pdo );
//echo __FILE__ . " line " . __LINE__ . " config.php globalLanguages: <pre>"; print_r($globalLanguages); echo "</pre>";
$config["languages"] = $globalLanguages;


// Get lang from parameter or default
configAutoSetLang();


// region LANGUAGES

/** */
function configLoadLanguages( $pdo ){
	$languagesObject = new Languages($pdo);
	

	// Reset selected
	$data = [];
	foreach ( $languagesObject->fetchAll() as $key => $language ){ 	
		$data[ $language["LanguageCode"] ] = [ "selected" => false ];
	}

	return $data;
}

/** */
function configRefreshLanguages( $lang, $from ){
	global $config, $globalLanguages, $smarty;
	//echo "configRefreshLanguages() lang: ".$lang.", from: $from<br/>";

	// Reset selected
	foreach ( $globalLanguages as $key => $language ){ 	
		$globalLanguages[$key]["selected"] = false;
	}
	
	// Set select language
	$globalLanguages[$lang]["selected"] = true;
	$config["language"] = $globalLanguages[$lang];

}

/** */
function configAutoSetLang(){
	global $config, $_SESSION;
	$lang = ( isset( $_GET["lang"] ) ) ? $_GET["lang"] : null;
	if ($lang == null){
		if ( isset( $_SESSION["lang"] ) ) {
			$lang = $_SESSION["lang"];
		}
	}
	// Default from config
	if ($lang == null) $lang = $config["defaultLangCode"];
	// Default
	if ($lang == null) $lang = "en";
	configSetLang( $lang, "configAutoSetLang()" );
}

/** */
function configSetLang( $lang, $from ){
	global $config, $_SESSION;
	$config["lang"] = $lang;
	$_SESSION["lang"] = $lang;
	configRefreshLanguages( $config["lang"], $from . " / configSetLang()" );
	configLoadLocales( $config["lang"] );
}

// endregion 




// region LOCALES

/** */
function configLoadLocales( $lang ){
	global $config, $locales;
	//echo __FILE__ . " line " . __LINE__ . "( lang=$lang )<br/>";
	//echo __FILE__ . " line " . __LINE__ . "( lang=$lang ) <b>config</b><pre>"; print_r($config); echo "</pre>";

	$locales = array();
	
	$files = glob($config["localesFolderPath"] . "/no-translate/*.json");
	foreach ( $files as $key => $file ){
		//echo $file."<br/>";
		$jsonString = file_get_contents( $file );
		$locales = array_merge( $locales, json_decode($jsonString, true) );
	}
	
	$files = glob($config["localesFolderPath"] . "/".$lang."/*.json");
	foreach ( $files as $key => $file ){
		//echo $file."<br/>";
		$localesJsonString = file_get_contents( $file );
		$locales = array_merge( $locales, json_decode($localesJsonString, true) );
	}
	
	//echo "<pre>"; print_r($locales); echo "</pre>";
}

// endregion
