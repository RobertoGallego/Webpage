<?php
$cd = __DIR__;
if ($_POST["submit"] == "OK")
{
    $id = $_POST["id"];
}
$line = array();
$content_full = file_get_contents($cd."/private/catalog.csv");
$handle = fopen($cd."/private/catalog.csv", "r+");
while(($line[] = fgetcsv($handle)) !== FALSE){}
foreach($line as $product)
{
    if ($product[0] == $id)
    {
        $old_str = $product[0].','.$product[1].','.$product[2].','.$product[3].','.$product[4].','.$product[5].','.$product[6].','.$product[7].','.$product[8].','.$product[9].','.$product[10];
        file_put_contents($cd."/private/catalog.csv", str_replace($old_str, '', $content_full));
    }
}
header("Refresh: 0.01; url=admin.php");
?>