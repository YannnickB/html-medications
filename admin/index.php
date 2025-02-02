<?php

//
include_once "includes_by_all.php";


// Init database
$sqlitePath = $config["database"]["filepath"];
//echo __FILE__." line ".__LINE__. "() sqlitePath=$sqlitePath<br>";


//
//echo __FILE__." line ".__LINE__. "() _POST=<pre>".json_encode($_POST, JSON_PRETTY_PRINT )."</pre><br>";
if ( isset($_POST["action"] ) ){
    if ( $_POST["action"] == "backupDatabase" ){
		$date = date("Y_m_d_H_m_s");
		$result = exportDatabase( null, null, null, null, $config["database"]["filepath"], $config["securePath"]."/backups/sql/database_$date.sql" );
		if ( $result[0] === 0 ) $userAlerts[] =  [ "title" => null, "message" => "Database backupped", "type" => "success" ];
		else $userAlerts[] =  [ "title" => "Database not backupped", "message" => "Database not backupped<br/>" . $result[1], "type" => "error" ];
    }
    else if ( $_POST["action"] == "deleteDatabase" ){
        global $pdo;
		$pdo = null;
		//$userAlerts[] =  [ "message" => "Init tables" , "type" => "success" ];
		$userAlerts[] =  [ "title" => "Delete database", "message" => $sqlitePath , "type" => "success" ];
        if (file_exists( $sqlitePath)) unlink($sqlitePath);
    }
    else if ( $_POST["action"] == "insertMedication" ){
		$medicationsObject = new Medications($pdo );
		$result = $medicationsObject->insert( $_POST );
		if ( $result[1] == 0)
			$userAlerts[] =  [ "title" => "", "message" => "Medication added", "type" => "success" ];
		else $userAlerts[] =  [ "title" => "", "message" => "Medication not added", "type" => "error" ];
    }
	else if ( $_POST["action"] == "deleteMedication" ){
		$medicationsObject = new Medications($pdo, $_POST["MedicationId"] );
		$result = $medicationsObject->delete();
		if ( $result[1] == 0)
			$userAlerts[] =  [ "title" => "", "message" => "Medication deleted", "type" => "success" ];
		else $userAlerts[] =  [ "title" => "", "message" => "Medication not deleted", "type" => "error" ];
    }
	else if ( $_POST["action"] == "deleteTag" ){
		$tagsObject = new Tags($pdo, $_POST["TagId"] );
		$result = $tagsObject->delete();
		if ( $result[1] == 0) $userAlerts[] =  [ "title" => "", "message" => "Tag deleted", "type" => "success" ];
		else $userAlerts[] =  [ "title" => "", "message" => "Tag not deleted", "type" => "error" ];
    }
}


// PDO
$pdo = null;
if (file_exists( $sqlitePath)) {
	$pdo = new PDO( "sqlite:".$sqlitePath );
}
else{
	$userAlerts[] =  [ "title" => "Create database", "message" => $sqlitePath, "type" => "success" ];
	$pdo = new PDO( "sqlite:$sqlitePath" );
	$result = createTables( $pdo, $config["securePath"]."/install/tables" );
	//echo __FILE__." line ".__LINE__. "() result=".json_encode($result, JSON_PRETTY_PRINT )."<br>";
	if ( $result[0] === 0 ) {
		$userAlerts[] =  [ "title" => "", "message" => "Tables created", "type" => "success" ];
	}
	else {
		echo "<div class='alert alert-danger'>ERROR: ".$result[2]."</div>";
		$userAlerts[] =  [ "title" => $result[2], "message" => "Tables not created <br/>".$result[2], "type" => "error" ];
	}
}
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

// Medications
$medicationsObject = new Medications($pdo);
$medications = $medicationsObject->fetchAll();
//echo __FILE__. " medications=<pre>" . json_encode($medications, JSON_PRETTY_PRINT) . "</pre><br/>";
$smarty->assign( "medications", $medications );


// Tags
$smarty->assign(  "tags", (new Tags($pdo))->fetchAll() );


//
include dirname(__DIR__) . "/header.php";

//
echo $smarty->fetch( $config["securePath"] . "/tpl/admin/pageIndex.tpl" );


/**
 * Create tables
 * @param mixed $pdo
 * @param mixed $securePath
 * @return array<int|string>
 */
function createTables( $pdo, $tablesInstallPath ) : array {

	// Get tables list
	$tables = json_decode( file_get_contents("$tablesInstallPath/tables.json" ) );

	// Check tables list is OK
	if ( !$tables ) return [1,"ERROR tables list from '$tablesInstallPath/tables.json' file is not valid" ];

	// For each tables
	foreach ( $tables as $key => $table){

		$sqlFilePath = "$tablesInstallPath/$key.sql";

		// Check SQL file exists
		if ( !is_file($sqlFilePath ) ) return [1,"ERROR file '$sqlFilePath' not exists for table $key," . json_encode($pdo->errorInfo()[2] ) ];

		//
		$result = $pdo->exec( file_get_contents( $sqlFilePath ) );

		// Return if error
		if ( !$result) return [1,"ERROR installing table $key," . json_encode($pdo->errorInfo()[2] ) ];
	}
	return [0,null];
}





function exportDatabase($host, $user, $password, $database, $sqliteFilePath, $targetFilePath)
{
	//return exec('mysqldump --host '. $host .' --user '. $user .' --password '. $password .' '. $database .' --result-file='.$targetFilePath) === 0;
	$command = "sqlite3 '$sqliteFilePath' .dump > '$targetFilePath'";
	$result = exec( $command, $output, $result_code  );
	if ( $result_code != 0 ){
		echo __FILE__. " ERROR result_code=$result_code with command <pre>$command</pre><br/>";
		return [1,"ERROR result_code=$result_code with command <pre>$command</pre>"];
	}
	return [0,null];
}