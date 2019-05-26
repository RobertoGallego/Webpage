<?php

$cd = __DIR__;
if ($_POST["submit"] == "OK")
{
    if ($_POST["passwd"] == "" || $_POST["login"] == "" || $_POST["passwd_check"] == "" || $_POST["nom"] == "" || $_POST["prenom"] == "" || $_POST["rue"] == "" || $_POST["ville"] == "")
        {
            echo '<script>alert("Merci de remplir tous les champs");</script>';
            echo '<a href="create.html"> Creez votre compte </a>' ;
            exit;
        }
    if ($_POST["passwd"] != $_POST["passwd_check"])
        {
            echo '<script>alert("Les mots de passe ne correspondent pas !");</script>';
            echo '<a href="create.html"> Creez votre compte </a>' ;
            exit;
        }
    $content = file_get_contents($cd."/private/passwd");
    $content = preg_split("/\n/", $content);
    foreach ($content as $line)
    {
        $tmp= unserialize($line);
        if ($tmp[0] == $_POST["login"])
            {
                echo '<script>alert("Ce login existe deja !");</script>';
                echo '<a href="create.html"> Creez votre compte </a>';   
                exit;
            }
    }
    if ($_POST["root"] == "No")
        $admin = 0;
    else if ($_POST["root"] == "Yes")
    {
        if ($_POST["rootpasswd"] == "adminsys")
            $admin = 1;
        else
        {
            echo '<script>alert("Mauvais mot de passe root.");</script>';
            echo '<a href="create.html"> Creez votre compte </a>';
            exit;
        }
    }
    $tab = array($_POST["login"], hash("whirlpool", $_POST["passwd"]), $admin, $_POST["nom"], $_POST["prenom"], $_POST["rue"], $_POST["ville"]);
    $ser = serialize($tab);
    file_put_contents($cd."/private/passwd", $ser."\n", FILE_APPEND);
    if ($admin == 0)
        echo "Votre compte utilisateur a bien ete cree, vous pouvez vous connecter !";
    else if ($admin == 1)
        echo "Votre compte ADMIN a bien ete cree, vous pouvez vous connecter !";
    
    echo '<a href="index.php">'." Retournez a l'acceuil </a>";
    exit ;
}
else
    echo "ERROR\n";
echo '<a href="create.html"> Creez votre compte </a>'; 
?>