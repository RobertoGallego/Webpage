<?php
$cd = __DIR__;
if ($_POST["submit"] == "OK")
{
    $id = $_POST["id"];
    $name = $_POST["name"];
    $footwear = $_POST["foot"];
    $fromage = $_POST["fromage"];
    $cat_foot = $_POST["cat_foot"];
    $cat_fromage = $_POST["cat_fromage"];
    $color = $_POST["color"];
    $prix = $_POST["prix"];
    $stock = $_POST["stock"];
    $img = $_POST["img_src"];
    $desc = $_POST["desc"];
}
$line = array();
$content_full = file_get_contents($cd."/private/catalog.csv");
$new_str = $id.','.$name.','.$footwear.','.$fromage.','.$cat_foot.','.$cat_fromage.','.$color.','.$prix.','.$stock.','.$img.','.$desc;
file_put_contents($cd."/private/catalog.csv", "\n".$new_str, FILE_APPEND);
header("Refresh: 0.01; url=admin.php");
?>