<?php
session_start();
$_SESSION["url"] = "footwear.php";
include "aff_products.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>P&Fromages</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" href="responsive.css" type="text/css">
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
                        <img id="logo_a" src="images/logo.png" alt="logo">
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
                        <li><a href="#">À PROPOS</a> </li>
                        <li><a href="#">CONTACT</a> </li>
                        <li><a href="show_cart.php"><img href="#" src="images/shop.png" alt="shop" class="shop"></a></li>
                    </div>
                </div>
            </div>
        </div>
        <!--==home slider==-->
        <div class="slider">
            <div><img class="slider_a" src="images/slider1.png" all="slider" usemap="#workmap"></div>
            <map name="workmap">
                <area shape="rect" coords="0,0,2500,1500" alt="button" href="#">
            </map>
            <!-- <div><img class="slider_a" src="images/slider1.png" all="slider"></div> -->
        </div>
        <!--==Category==-->
        <div id="main-header-b">
                    <!--==logo==-->
                    <div id="logo-b">
                        <p>Category</p>
                    </div>
                    <!--==user name==-->
                    <div id="user-menu-b">
                        <li><a href="index.php">FROMAGE</a> </li>
                         <div class="dropdown-content">
                            <a href="fromage.php">FROMAGE</a>
                   	    	<a href="patedure.php">PÂTE DURE</a>
                        	<a href="patemolle.php">PÂTE MOLLE</a>
                	    </div>
                    </div>
                    <div id="user-menu-b">
                        <li><a href="#">FOOTWEAR</a> </li>
                        <div class="dropdown-content">
                            <a href="footwear.php">FOOTWEAR</a>
                   	    	<a href="pantoufles.php">PANTOUFLES</a>
                        	<a href="chaussons.php">CHAUSSONS</a>
                        	<a href="charentaises.php">CHARENTAISES</a>
                	    </div>
                    </div>
                </div>
        <?php
        $cd = __DIR__;
        $search = $_GET["text"];
        $line = array();
        $handle = fopen($cd."/private/catalog.csv", "r");
        while(($line[] = fgetcsv($handle)) !== FALSE){}
        foreach($line as $tab)
        {
          if (preg_match("/$search/i", $tab[1]))
          {
              echo '<div class="card">
              <img src="'.$tab[9].'" alt="#" style="width:240px; height:240px">
              <h1 class ="title_p">'.$tab[1].'</h1>
              <p class="price">'.$tab[7].'$</p>
              <p class="qty">Qty. '.$tab[8].'</p>
              <p class="size">'.$tab[10].'</p>';
              if ($tab[8] > 0)
                echo '<form action="add_to_cart.php" method="POST">
                <input type="submit" name="cart" value="Add to cart : product #'.$tab[0].'">
                </form>
                </div>';
             else
                echo '<form>
                <input type="submit" name="cart" value="product #'.$tab[0].' is unavailable">
                </form>
                </div>';
         }
        }
        ?>
            <!-- <div class="card">
                <img src="images/pantuflas.jpg" alt="#" style="width:100%">
                <h1>Tailored Jeans</h1>
                <p class="price">$19.99</p>
                <p class="qty">Qty. 9</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Add to Cart</button></p>
            </div>
            <div class="card">
                <img src="images/pantuflas.jpg" alt="#" style="width:100%">
                <h1>Tailored Jeans</h1>
                <p class="price">$19.99</p>
                <p class="qty">Qty. 9</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Add to Cart</button></p>
            </div>
            <div class="card">
                <img src="images/pantuflas.jpg" alt="#" style="width:100%">
                <h1>Tailored Jeans</h1>
                <p class="price">$19.99</p>
                <p class="qty">Qty. 9</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Add to Cart</button></p>
            </div>
            <div class="card">
                <img src="images/pantuflas.jpg" alt="#" style="width:100%">
                <h1>Tailored Jeans</h1>
                <p class="price">$19.99</p>
                <p class="qty">Qty. 9</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Add to Cart</button></p>
            </div>
            <div class="card">
                <img src="images/pantuflas.jpg" alt="#" style="width:100%">
                <h1>Tailored Jeans</h1>
                <p class="price">$19.99</p>
                <p class="qty">Qty. 9</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Add to Cart</button></p>
            </div>
            <div class="card">
                <img src="images/pantuflas.jpg" alt="#" style="width:100%">
                <h1>Tailored Jeans</h1>
                <p class="price">$19.99</p>
                <p class="qty">Qty. 9</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Add to Cart</button></p>
            </div>
            <div class="card">
                <img src="images/pantuflas.jpg" alt="#" style="width:100%">
                <h1>Tailored Jeans</h1>
                <p class="price">$19.99</p>
                <p class="qty">Qty. 9</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Add to Cart</button></p>
            </div>
            <div class="card">
                <img src="images/pantuflas.jpg" alt="#" style="width:100%">
                <h1>Tailored Jeans</h1>
                <p class="price">$19.99</p>
                <p class="qty">Qty. 9</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Add to Cart</button></p>
            </div>
            <div class="card">
                <img src="images/pantuflas.jpg" alt="#" style="width:100%">
                <h1>Tailored Jeans</h1>
                <p class="price">$19.99</p>
                <p class="qty">Qty. 9</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Add to Cart</button></p>
            </div>
            <div class="card">
                <img src="images/pantuflas.jpg" alt="#" style="width:100%">
                <h1>Tailored Jeans</h1>
                <p class="price">$19.99</p>
                <p class="qty">Qty. 9</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Add to Cart</button></p>
            </div>
            <div class="card">
                <img src="images/pantuflas.jpg" alt="#" style="width:100%">
                <h1>Tailored Jeans</h1>
                <p class="price">$19.99</p>
                <p class="qty">Qty. 9</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Add to Cart</button></p>
            </div>
            <div class="card">
                <img src="images/pantuflas.jpg" alt="#" style="width:100%">
                <h1>Tailored Jeans</h1>
                <p class="price">$19.99</p>
                <p class="qty">Qty. 9</p>
                <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>
                <p><button>Add to Cart</button></p>
            </div> -->
        </div>
        <!--== Footer ==-->
		<footer>
            <div><img class="slider_a" src="images/footer.jpg" all="slider"></div>
        </footer>
	</body>
</html>