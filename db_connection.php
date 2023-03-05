<?php

$sname="localhost";
$uname="root";
$pass="";

$db_name="horus_library_db";

try{
    $conn=new PDO("mysql:host=$sname;dbname=$db_name", $uname, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}
?>
