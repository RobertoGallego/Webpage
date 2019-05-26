<?php
session_start();
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>P&Fromages</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="responsive.css" type="text/css">
    <link rel="stylesheet" href="mod.css" type="text/css">
    <link rel="action" href="modif.php">
</head>
<body>
        <div id="wrapper">
            <div id="header">
                <div id="subheader">
                    <div class="container">
                        <p>Livraison gratuite pour les commandes supérieures à €29.90</p>
                        <?php 
                        if ($_SESSION["login"] == "")
                            echo "<a href='login.html'>Connexion</a>";
                        else
                            echo "<a href='modif.php'>Modifier Compte</a>";?>
                            <?php 
                            if ($_SESSION["login"] == "")
                                echo "<a href='create.html'>Creez Compte</a>";
                            else
                                echo "<a>Bienvenue ".$_SESSION["prenom"]."</a>";?>
                            <?php
                            if ($_SESSION["login"] != "")
                                echo "<a href='logout.php'>logout</a>";?>
                    </div>
                </div>
                <!--==main header==-->
                <div id="main-header">
                    <!--==logo==-->
                    <div id="logo">
                        <a href="index.php"><img id="logo_a" src="images/logo.png" alt="logo"></a>
                    </div>
                    <!--==search==-->
                    <div id="search">
                    <form action="search.php">
                        <input class="search-area" type="text" name="text" placeholder="Ex: Chaussons">
                        <input class="search-button" type="submit" name="submit" value="Chercher">
                    </form>
                    </div>
                    <!--==user name==-->
                    <div id="user-menu">
                        <li><a href="index.php">HOME</a> </li>
                        <li><a href="apropos.php">À PROPOS</a> </li>
                        <li><a href="contact.php">CONTACT</a> </li>
                    </div>
                </div>
            </div>
        </div>
        <!--==home slider==-->
<div id="mid">
<?php
$cd = __DIR__;
$line = array();
$content_full = file_get_contents($cd."/private/catalog.csv");
$handle = fopen($cd."/private/catalog.csv", "r+");
while(($line[] = fgetcsv($handle)) !== FALSE){}
if ($_SESSION["panier"] != "")
{
    echo "<BR />";
    foreach ($_SESSION["panier"] as $key => $item)
    {
        echo '<img style="width:100px;height:100px"src="'.$line[$item - 1][9].'"></img><BR />';
        echo $line[$item - 1][1]." #".$line[$item - 1][0]." for : ".$line[$item - 1][7]."<BR /><BR />";
        $prix += $line[$item - 1][7];
        $nb += 1;
    }
    echo "<BR /> You have ".$nb." item in basket, for a total of : ".$prix."$<BR/><BR />";
    if ($_SESSION["login"] == "")
    {
        echo '<a href="login.html"> You have to be logged in to checkout</a><BR /><BR /><BR />';
        echo '<a href="create.html"> Or create an account, you wont lose your cart ;) </a><BR /><BR /><BR />';
    }
    else if ($_SESSION["panier"])
        echo '<a style="text-decoration: none" href=create_order.php><button id="ok">VALIDEZ</button></a>';
    }
else
    echo "<p>Panier vide :(</p><BR />";
?>
</div>
        <!--== Footer ==-->
		<footer>
        </footer>
	</body>
</html>