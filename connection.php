<?php

$servername = "localhost";
$username = "root";
$password = '';
$databasename = "furni";

$conn = new mysqli($servername, $username, $password, $databasename);

// if(empty($conn->connect_error)){
//     echo "<h1>connection successfull</h1>";
// }else{
//     echo "<h1>something went wrong connection unsuccessfull</h1>";
// }

if($conn->connect_errno>0){
    echo "<h1>something went wrong connection unsuccessfull</h1>";
}

?>