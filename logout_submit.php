<?php  session_start();
     if (isset($_SESSION["firstname"])) {
    session_destroy(); 
    echo $_SESSION["firstname"];
    echo "Logged Out";
    }?>