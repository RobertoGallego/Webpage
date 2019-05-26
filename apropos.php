<?php
session_start();
$_SESSION["url"] = "index.php";
include "aff_products.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>P&Fromages</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="responsive.css" type="text/css">
        <link rel="stylesheet" href="mod.css" type="text/css">
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
                    <form action="search.php" method="GET">
                        <input class="search-area" type="text" name="text" placeholder="Ex: Chaussons">
                        <input class="search-button" type="submit" name="submit" value="Chercher">
                    </form>
                    </div>
                    <!--==user name==-->
                    <div id="user-menu">
                        <li><a href="index.php">HOME</a> </li>
                        <li><a href="apropos.php">À PROPOS</a> </li>
                        <li><a href="contact.php">CONTACT</a> </li>
                        <li><a href="show_cart.php"><img href="#" src="images/shop.png" alt="shop" class="shop"></a></li>
                    </div>
                </div>
            </div>
        </div>
        <!--==home slider==-->
        <div class="slider">
            <div><img class="slider_a" src="images/apropos.png" all="slider" usemap="#workmap"></div>
            <map name="workmap">
                <area shape="rect" coords="0,0,2500,1500" alt="button" href="#">
            </map>
            <!-- <div><img class="slider_a" src="images/slider1.png" all="slider"></div> -->
        </div>
        <!--==Category==-->
        <div id=mid>
            <h1>À PROPOS</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae dolor sit amet risus dignissim interdum. Integer mollis consequat enim, in condimentum orci aliquet nec. Donec tellus nibh, elementum vitae commodo ut, ornare rhoncus ante. Sed in fermentum arcu, posuere aliquam erat. Nam ante tellus, aliquet in leo in, fringilla suscipit arcu. Phasellus ac augue leo. In non ex elementum, blandit tellus dapibus, euismod erat. Aenean lorem nunc, convallis nec pharetra varius, semper sit amet sapien.

Etiam bibendum nisl id justo hendrerit ullamcorper. Cras vel erat in metus ultrices mattis at sed enim. Ut commodo nec sem id lacinia. Nam mi felis, tempus et posuere sit amet, pharetra vitae dolor. Sed maximus luctus dui nec elementum. Donec rutrum elit at lorem lacinia pellentesque. Maecenas diam nibh, pellentesque at sem eget, lacinia egestas libero. Ut dapibus massa at accumsan suscipit. Nulla a congue lectus, sit amet rhoncus mauris. Aenean iaculis luctus.</p>
        </div>
        <!--== Footer ==-->
		<footer>
            <div><img class="slider_aaa" src="images/footer.jpg" all="slider"></div>
        </footer>
	</body>
</html>