<?php

//
global $globalLanguages;

// Get languages
$globalLanguages = includesLanguages_GetLanguages( $pdo );

// Set lang from _GET, _SESSION or config
includesLanguages_AutoSetLang();


/** 
 * Get languages  
 */
function includesLanguages_GetLanguages( $pdo ){
	$data = [];
	foreach ( (new Languages($pdo))->fetchAll() as $language ){ 	
		$data[ $language["LanguageCode"] ] = [ "selected" => false ];
	}
	return $data;
}


/** 
 * Auto set lang from _GET parameters, otherwise from user _SESSION, otherwise from default lang from config
 */
function includesLanguages_AutoSetLang(){
	global $config, $_SESSION;

	// From _GET parameters
	$lang = $_GET["lang"] ?? null;

	// From user session
	if ($lang == null){
		if ( isset( $_SESSION["lang"] ) ) {
			$lang = $_SESSION["lang"];
		}
	}

	// Default from config
	if ($lang == null) $lang = $config["defaultLangCode"];
	
	// Default hardcoded
	if ($lang == null) $lang = "en";

	// Set effective language
	includesLanguages_SetEffectiveLang( $lang );
}


/**
 * Set effective lang in $config var and in user SESSION, set selected language in $globalLanguages and $config["language"], load locales
 */
function includesLanguages_SetEffectiveLang( $lang ){
	global $config, $_SESSION;
	$config["lang"] = $lang;
	$_SESSION["lang"] = $lang;
	includesLanguages_RefreshLanguages( $config["lang"] );
	includesLanguages_LoadLocales( $config["lang"] );
}


/** 
 * Set selected language in $globalLanguages and set language infos in $config["language"]
 */
function includesLanguages_RefreshLanguages( $lang ){
	global $config, $globalLanguages;

	// Reset selected
	foreach ( $globalLanguages as $key => $language ){ 	
		$globalLanguages[$key]["selected"] = false;
	}
	
	// Set select language
	$globalLanguages[$lang]["selected"] = true;

	// Set language infos in config
	$config["language"] = $globalLanguages[$lang];

}


/** 
 * 
 */
function includesLanguages_LoadLocales( $lang ){
	global $config, $locales;
	//echo __FILE__ . " line " . __LINE__ . "( lang=$lang ) <b>config</b><pre>"; print_r($config); echo "</pre>";

	$locales = [];
	
	$files = glob($config["localesFolderPath"] . "/no-translate/*.json");
	foreach ( $files as $key => $file ){
		$jsonString = file_get_contents( $file );
		$locales = array_merge( $locales, json_decode($jsonString, true) );
	}
	
	$files = glob($config["localesFolderPath"] . "/".$lang."/*.json");
	foreach ( $files as $key => $file ){
		$localesJsonString = file_get_contents( $file );
		$locales = array_merge( $locales, json_decode($localesJsonString, true) );
	}
	
	//echo "<pre>" . json_encode($locales, JSON_PRETTY_PRINT) . "</pre><br/>";
}
