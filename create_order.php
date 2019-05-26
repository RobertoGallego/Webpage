<?php
session_start();
$cd = __DIR__;
$line = array();
date_default_timezone_set ("Europe/Paris");
$content_full = file_get_contents($cd."/private/catalog.csv");
$handle = fopen($cd."/private/catalog.csv", "r+");
file_put_contents($cd."/private/orders", "Command by : ".$_SESSION["prenom"]." ".$_SESSION["nom"]." at: ".date("F j, Y, g:i a"."\n\n"), FILE_APPEND);
while(($line[] = fgetcsv($handle)) !== FALSE){}
foreach ($_SESSION["panier"] as $key => $item)
{
    $str = $str.$line[$item - 1][1]." #".$line[$item - 1][0]." for : ".$line[$item - 1][7]."\n";
    $prix += $line[$item - 1][7];
    $nb += 1;
}
file_put_contents($cd."/private/orders", $str, FILE_APPEND);
file_put_contents($cd."/private/orders", "\n\n\n".$nb." products for a total of : ".$prix."\n\n", FILE_APPEND);
file_put_contents($cd."/private/orders", "-------------------------------------\n\n\n", FILE_APPEND);
echo "Thank you for your order ! It has been validated, you will receive your pantoufles and fromages very soon\n";
echo '<a href="index.php">Retour a la homepage</a>';
$_SESSION["panier"] = "";
?>