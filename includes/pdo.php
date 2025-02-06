<?php

global $pdo;

// Get type
if ( isset( $config["database"] ) ){

	$dbConfig = $config["database"];
	$type = $dbConfig["type"] ?? null;

	if ( $type == "sqlite" ){

		$filepath = $dbConfig["filepath"] ?? null;
		if ( $filepath ){
			
			try{
				// Create PDO
				$pdo = new PDO("sqlite:$filepath" );

				// Enable references contrainst
				$pdo->exec('PRAGMA foreign_keys=ON');
			}
			catch(Exception $e){
				echo "PDO Connection failed: ".nl2br($e->getMessage() );
			}

		}
	}
	else trigger_error("ERROR opening system database. 'config.database.type' is NULL", E_USER_ERROR);
}
