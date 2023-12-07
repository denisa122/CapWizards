<?php
    require("constants.php");

    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
    if(!$conn){
        die("Gg wp,you broke it");
    }

    $dbSelect = mysqli_select_db($conn, DB_NAME);

    if(!$dbSelect){
        die("Some people just shouldn't code, maybe try poetry?".mysqli_error($conn));
    }