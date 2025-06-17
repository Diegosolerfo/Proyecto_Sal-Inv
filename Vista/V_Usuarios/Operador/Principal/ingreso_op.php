<?php
    session_start();
    if($_SESSION["rol"]!="Administrador" || $_SESSION["rol"]!="Cliente"){
        
    }
    else{
        header("location: ../../index.php");
    }
?>