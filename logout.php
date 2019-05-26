<?php
session_start();
$_SESSION["loggued_on_user"] = "";
$_SESSION["passwd"] = "";
$_SESSION["login"]= "";
$_SESSION["admin"] = "";
$_SESSION["nom"] = "";
$_SESSION["prenom"] = "";
$_SESSION["rue"] = "";
$_SESSION["ville"] = "";
session_destroy();
header("location:index.php")
?>