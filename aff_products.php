<?php

function    aff_products()
{
$cd = __DIR__;
$line = array();
$handle = fopen($cd."/private/catalog.csv", "r");
while(($line[] = fgetcsv($handle)) !== FALSE){}
foreach($line as $tab)
{
  if ($tab[1])
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
}
?>