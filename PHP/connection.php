<?php
 
    $severName = "localhost";
    $userName = "root";
    $password = "";
    $dbName  = "ecommerce";

    $checkConnection = mysqli_connect($severName,$userName,$password,$dbName);

    if($checkConnection)
    {
        echo "Succesfully Connected......</br></br></br>";
    }
    
    else
    {
       echo " !!!!!!   Failed  !!!!!!!!!</br> ";
    }

 ?>


