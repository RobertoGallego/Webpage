<?php
session_start();
$cd = __DIR__;
if ($_POST["submit"] == "Modifier")
{
    $content_full = file_get_contents($cd."/private/passwd");
    $content = preg_split("/\n/", $content_full);
    foreach ($content as $line)
    {
        $tmp = unserialize($line);
        if ($tmp[0] == ($_SESSION["login"]))
            {
                if ($_POST["new_nom"] != "")
                    $_SESSION["nom"] = $_POST["new_nom"];
                if ($_POST["new_prenom"] != "")
                    $_SESSION["prenom"] = $_POST["new_prenom"];
                if ($_POST["new_rue"] != "")
                    $_SESSION["rue"] = $_POST["new_rue"];
                if ($_POST["new_ville"] != "")
                    $_SESSION["ville"] = $_POST["new_ville"];
                $new_str = serialize(array($_SESSION["loggued_on_user"], $_SESSION["passwd"], $_SESSION["admin"], $_SESSION["nom"], $_SESSION["prenom"], $_SESSION["rue"], $_SESSION["ville"]));
                file_put_contents($cd."/private/passwd", str_replace($line, $new_str, $content_full));
                header("Refresh: 0.1; url=index.php");  
                exit;
                }
            }
    }
?>