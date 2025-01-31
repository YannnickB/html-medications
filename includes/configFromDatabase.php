<?php

//
if ( $pdo ){

    //
    $configsObject = new Configs($pdo);
    $configsFromDatabase = $configsObject->fetchAll();

    // Save in global config
    foreach ( $configsFromDatabase as $key => $configFromDatabase){
        $config[ $configFromDatabase["ConfigName"] ] = $configFromDatabase["ConfigValue"];
    }

    // Release configs object
    $configsObject = null;

    //echo __FILE__. " config=<pre>"; print_r( $config); echo "</pre>";
}
