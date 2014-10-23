<?php
// connect to the database
// take care of both cases (open shift and localhost)
function loadDatabase()
{
    $dbHost = "";
    $dbPort = "";
    $dbUser = "";
    $dbPassword = "";
    
    $dbName = "pc_part_picker_lite";
    $openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');

    if ($openShiftVar === null || $openShiftVar == "")
    {
        // Not in the openshift environment
        //echo "Using local credentials: "; 
        require("setLocalDatabaseCredentials.php");
    }
    else 
    { 
        // In the openshift environment
        //echo "Using openshift credentials: ";

        $dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
        $dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
        $dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
        $dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
    } 
    
    //echo "host:$dbHost:$dbPort dbName:$dbName user:$dbUser password:$dbPassword<br >\n";
    
    try
    {
        $db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
        return $db;
    }
    catch (PDOException $ex)
    {
        echo "Error connecting to database.<br>";
        echo "Error: " . $ex->getMessage() . "<br>";
        die();
    }
       
}
