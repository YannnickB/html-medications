<?php

// Errors
ini_set("display_errors", "1");
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);


// Start session
session_start();


// Config var
global $config;
$config = [ "codeVersionNumber" => 1 ];


// Root pathes config
include __DIR__ . "/config.php";
// Include more config
include __DIR__ . "/includes/config.php";



/////////////////////
// SYSTEM DATABASE //
/////////////////////

// Get config
global $databaseConfig;
if ( isset( $config["securePath"] ) ){
	include $config["securePath"] . "/config/configDatabase.php";
}

// Include PDO
include_once $config["rootPath"] . "/includes/pdo.php";



/////////////
// VENDORS //
/////////////

require 'vendor/autoload.php';



/////////////
// CLASSES //
/////////////

include_once $config["securePath"] . "/class/PdoObjectRecordAbstract.php";

include_once $config["securePath"] . "/class/Configs.php";
include_once $config["securePath"] . "/class/Languages.php";
include_once $config["securePath"] . "/class/Medications.php";
include_once $config["securePath"] . "/class/MedicationsTags.php";
include_once $config["securePath"] . "/class/Tags.php";


// Config from database
include_once $config["rootPath"] . "/includes/configFromDatabase.php";



/////////////////////
// GLOBAL LANGUAGE //
/////////////////////

global $globalLang;
$config["lang"] = $globalLang;

// Languages config
include_once $config["rootPath"] . "/includes/languages.php";
//echo __FILE__ . " line " . __LINE__ . " globalLanguages=<pre>"; print_r($globalLanguages); echo "</pre>";



////////////
// SMARTY //
////////////

// Smarty
include $config["rootPath"] . "/includes/smarty.php";
