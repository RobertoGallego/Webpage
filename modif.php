<?php
session_start();
?>

<html>
<head>
	<meta charset="UTF-8">
	<title>P&Fromages</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="responsive.css" type="text/css">
    <link rel="action" href="modif.php">
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
        <div id="mid" class="slider">
            <form action="modif_function.php" method="POST">
            <fieldset type="hidden">
            <strong> Remplir les cases que vous souhaitez modifier </strong><BR \><BR \>
            Nom : <?php echo $_SESSION["nom"]?> <BR \>
            Nouveau nom : <input id="in" type="text" name="new_nom">
            <BR \><BR \>
            Prenom : <?php echo $_SESSION["prenom"]?> <BR \>
            Nouveau prenom : <input id="in"  type="text" name="new_prenom">
            <BR \><BR \>
            Adresse (rue) : <?php echo $_SESSION["rue"]?> <BR \>
            Nouvelle adresse (rue) : <input id="in"  type="text" name="new_rue">
            <BR \><BR \>
            Adresse (ville) : <?php echo $_SESSION["ville"]?> <BR \>
            Nouvelle adresse (ville) : <input id="in"  type="text" name="new_ville">
            <BR \><BR \>
            <input id="ok" type="submit" name="submit" value="Modifier">
            <BR />
            </fieldset>
            </form>
            <form action="delete_user.php" method="POST">
            <fieldset type="hidden">
           Souhaitez-vous supprimer votre compte ? 
           <input type="radio" name="delete" value="Yes"> Yes <BR \>
           Si oui, merci de confirmer avec votre mdp : <input if="on" type="password" name="passwd">
           <input id="ok" type="submit" name="del_submit" value="delete">
               </fieldset>
          </form>
          <hr>
         <BR \>
            <a id="ok" href="index.php">Retournez a l'acceuil</a>
        </div>
        <!--== Footer ==-->
		<footer>
            <div><img class="slider_aa" src="images/footer.jpg" all="slider"></div>
        </footer>
	</body>
</html>
