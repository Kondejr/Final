<?php

    //session_start();

    $serverName = "servercomputo2.database.windows.net"; // update me
    $connectionOptions = array(
        "Database" => "bdComputo", // update me
        "Uid" => "administrador", // update me
        "PWD" => "SanUniLagCow12" // update me
    );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if ($conn === false){
        die(print_r(sqlsrv_errors(), true));
    }
?>