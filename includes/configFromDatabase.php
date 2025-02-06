<?php

//
if ( $pdo ){

    //
    $configsFromDatabase = (new Configs($pdo))->fetchAll();

    // Save in global config
    foreach ( $configsFromDatabase as $key => $configFromDatabase){
        $config[ $configFromDatabase["ConfigName"] ] = $configFromDatabase["ConfigValue"];
    }

    //echo __FILE__. " config=<pre>"; print_r( $config); echo "</pre>";
}
