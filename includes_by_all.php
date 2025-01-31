<?php

ini_set("display_errors", "1");
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);


session_start();


/** */
global $config;
$config = [ "codeVersionNumber" => 1 ];


// Root pathes config
include __DIR__ . "/config.php";
// Include more config
include __DIR__ . "/includes/config.php";


// Secure path
if ( is_file( $config["rootPath"] . "/config/config-secure-folder.php" ) ){
	include $config["rootPath"] . "/config/config-secure-folder.php";
}






/////////////
// CONFIGS //
/////////////


// Server config
//include( $config["rootPath"] . "/config/config-server.php" );


// DATABASE CONFIG
global $databaseConfig;
if ( isset( $config["securePath"] ) ){
	include $config["securePath"] . "/config/configDatabase.php";
	//$config = array_merge( $config, array( "database" => $databaseConfig ) );
}
//echo "<br/><br/><br/><br/><br/>" . __FILE__ . " line " . __LINE__ . " config: <pre>"; print_r($config); echo "</pre><br/>";
//echo __FILE__ . " line " . __LINE__ . "privateConfig: <pre>"; print_r($config); echo "</pre><br/>";

global $pdo;
if ( isset( $config["database"]["type"] ) && $config["database"]["type"] == "sqlite" ){
	if ( isset( $config["database"]["filepath"] ) && is_file( $config["database"]["filepath"] )  ){
		try{
			// Create PDO
			$pdo = new PDO("sqlite:" . $config["database"]["filepath"]);

			// Enable references contrainst
			$pdo->exec('PRAGMA foreign_keys=ON');
		}
		catch(Exception $e){
			echo "PDO Connection failed: ";
		}
	}
}
//
//$structFilePathWithoutExtension = "secure/caches/php-pdo-struc/".$config["database"]["dbname"]."-struc";

/////////////
// VENDORS //
/////////////

require 'vendor/autoload.php';



/////////////
// CLASSES //
/////////////

include $config["securePath"] . "/class/PdoObjectRecordAbstract.php";

include $config["securePath"] . "/class/Configs.php";
include $config["securePath"] . "/class/Languages.php";
include $config["securePath"] . "/class/Medications.php";
include $config["securePath"] . "/class/MedicationsTags.php";
include $config["securePath"] . "/class/Tags.php";


// Config from database
include $config["rootPath"] . "/includes/configFromDatabase.php";


/////////////////////
// GLOBAL LANGUAGE //
/////////////////////

global $globalLang;
//$globalLang = "en";


$config["lang"] = $globalLang;

// Languages config
include( $config["rootPath"] . "/includes/languages.php" );
//echo __FILE__ . " line " . __LINE__ . " globalLanguages=<pre>"; print_r($globalLanguages); echo "</pre>";

// Include languages
//include_once $config["securePath"] . "/class/languagesHandler.php";
//include $config["rootPath"] . "/includes/language.php";


////////////
// SMARTY //
////////////



// Smarty
include $config["rootPath"] . "/includes/smarty.php";
