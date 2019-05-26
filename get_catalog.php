<?php
function get_catalog()
{
    $cd = __dir__;
    $handle = fopen($cd."/private/catalog.csv", "r+");
    $line = array(array());
    while (($line[] = fgetcsv($handle, 0, ",")) !== FALSE)
    {
    }
    return ($line);
}
?>