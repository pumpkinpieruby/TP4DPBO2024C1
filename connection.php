<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_tp4 = "db_tp4";  
    $conn = new mysqli($servername, $username, $password, $db_tp4);
    if($conn->connect_error){
        die("Connection failed".$conn->connect_error);
    }
    echo "";
    
    ?>