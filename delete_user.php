<?php
include("auth.php");
session_start();
$cd = __DIR__;
if ($_POST["delete"] == "Yes" && $_POST["del_submit"] == "delete")
{
    if (auth($_SESSION["login"], $_POST["passwd"]))
    {
       $content_full = file_get_contents($cd."/private/passwd");
       $content = preg_split("/\n/", $content_full);
       foreach ($content as $line)
       {
           $tmp = unserialize($line);
           if ($tmp[0] == ($_SESSION["login"]))
           {
               file_put_contents($cd."/private/passwd", str_replace($line."\n", "", $content_full));
               session_destroy();
               header("Refresh: 1; url=index.php");
               exit;
            }
       }
    }
    else
    {
        // echo '<script>alert("Reessayez avec le bon mdp !");</script>';
        header("Refresh: 1; url=modif.php");  
        exit;
    }
}
header("Refresh: 0.1; url=modif.php");  
?>