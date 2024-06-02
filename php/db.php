<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "interview";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("Failed to connect because ". $conn->connect_error);
    }else{
        
    }
?>