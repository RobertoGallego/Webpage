<?php

function    get_session_info($login, $passwd)
{
    session_start();
    $cd = __DIR__;
    $content_full = file_get_contents($cd."/private/passwd");
    $content = preg_split("/\n/", $content_full);
    foreach ($content as $line)
    {
        $tmp = unserialize($line);
        if ($tmp[0] == ($login))
        {
             $_SESSION["login"]= $login;
             $_SESSION["passwd"] = hash("whirlpool", $passwd);
             $_SESSION["loggued_on_user"] = $login;
             $_SESSION["admin"] = $tmp[2];
             $_SESSION["nom"] = $tmp[3];
             $_SESSION["prenom"] = $tmp[4];
             $_SESSION["rue"] = $tmp[5];
             $_SESSION["ville"] = $tmp[6];
        }
    }
}

include("auth.php");
session_start();
if ($_POST["submit"] == "OK")
{
if (auth($_POST["login"], $_POST["passwd"]))
    {
        get_session_info($_POST["login"], $_POST["passwd"]);
        header("location: index.php");
        echo '<script>alert("Bonjour '.$_SESSION["prenom"].' '.$_SESSION["nom"].', vous etes connectes en tant que : '.$_SESSION["loggued_on_user"].'");</script>';
        exit;
    }
    else
    {
        $_SESSION["loggued_on_user"] = "";
        header("Refresh: 1; url=login.html"); 
        echo '<script>alert("Combinaison login / mot de passe incorrecte, merci de reesayer");</script>';
    }
}
?>
