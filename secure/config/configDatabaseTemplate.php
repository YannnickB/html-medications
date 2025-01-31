<?php

//$privateConfig = array_merge( $privateConfig, $databaseConfig );
$config["database"] = [
	"type"       => "sqlite",
	"servername" => "localhost",
	"username"   => "",
	"password"   => "",
	"dbname"     => "",
	"filepath"   => $config["securePath"] . "/database/sqlite/database.sqlite",
];
