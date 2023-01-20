<?php


//prevent hackers and malicious attacks from accessing this file

if(!isset($_SERVER['HTTP_REFERER'])){
    header('location:../index.php');
    exit; 
 }

//use try catch block to establish connection or display errors if any

try{

    //host
define("HOST", "localhost");

//dbname
define("DBNAME", "ovs");

//user
define("USER", "root");

//password
define("PASS", "");


//Create a new connection object with the new PDO instance which is more secure than mysqli

//DEFAULT USERNAME = root
//DEFAULT PASSWORD = ""(empty string to represent blank)

$conn= new PDO("mysql:host=".HOST.";dbname=".DBNAME.";",USER,PASS);

  

//error handling done by PDO Exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch (PDOException $e) {
    echo $e->getMessage();
}







?>