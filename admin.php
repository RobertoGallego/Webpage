<?php
session_start();
if ($_SESSION["admin"] == 0)
{
    echo '<script>alert("Not Admin, redirect to homepage");</script>';
    header("Refresh: 0.01; url=index.php");  
}
?>

<html>
<head>
    <link rel="action" href="modif.php">
</head>
<body>
    <form action="stock_management.php" method="POST">
        <fieldset type="hidden">
    <strong> Gestion des stocks </strong><BR \>
    product_id : <input type="text" name="id">
    stock: <input type="text" name="stock">
    <input type="submit" name="submit" value="OK">
    </fieldset>
    </form>
    <BR />
    <BR />
    <form action="product_name.php" method="POST">
        <fieldset type="hidden">
    <strong> Changement de nom_produit </strong><BR \>
    product_id : <input type="text" name="id">
    new product_name : <input type="text" name="new_name">
    <input type="submit" name="submit" value="OK">
    </fieldset>
    </form>
    <BR />
    <BR />
    <form action="product_delete.php" method="POST">
        <fieldset type="hidden">
    <strong> Delete product </strong><BR \>
    product_id : <input type="text" name="id">
    <input type="submit" name="submit" value="OK">
    </fieldset>
    </form>
    <BR />
    <BR />
    <form action="add_product.php" method="POST">
        <fieldset type="hidden">
    <strong> Add product </strong><BR \>
    product_id : <input type="text" name="id"><BR \>
    product_name : <input type="text" name="name"><BR \>
    footwear (bool): <input type="text" name="foot"><BR \>
    fromage (bool): <input type="text" name="fromage"><BR \>
    cat_footwear(0 - 3) : <input type="text" name="cat_foot"><BR \>
    cat fromage (0 - 2): <input type="text" name="cat_fromage"><BR \>
    color : <input type="text" name="color"><BR \>
    prix: <input type="text" name="prix"><BR \>
    stock: <input type="text" name="stock"><BR \>
    img_src : <input type="text" name="img_src"><BR \>
    desc : <input type="text" name="desc"><BR \>
    <input type="submit" name="submit" value="OK">
    </fieldset>
    </form>
    <BR />
    <BR />
    <a href="index.php">Retournez a l'acceuil</a><BR />
    Orders : 
    <BR \>
    <?php
    $str = file_get_contents(__DIR__."/private/orders");
    $str = preg_replace("/\n/", "<BR/>", $str);
    echo $str;
    ?>
</body>
</html>