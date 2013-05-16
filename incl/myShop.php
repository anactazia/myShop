<?php
// Start session, shopping cart is stored in session
error_reporting(-1);
session_name('shoppingcart');
session_start();

// Get the action that controlles what will happen
$action = empty($_GET['action']) ? null : $_GET['action'];


// Create the shopping cart in the session if it does not exists.
// And support action=clear to do the same.
if ($action == 'clear' || !isset($_SESSION['cart'])) {
  $_SESSION['cart'] = array('sum'=>0, 'numitems' => 0, 'items'=>array());    
}


// Define the items and prices
$items = array(
  'chair01' => array('title' => 'Röd stol', 'price' => '2000'),
  'chair02' => array('title' => 'Röd stol', 'price' => '2500'),
  'chair03' => array('title' => 'Röd stol', 'price' => '1850'),
  'chair04' => array('title' => 'Röd stol', 'price' => '3000'),
  'chair05' => array('title' => 'Röd stol', 'price' => '2800'),
  'chair06' => array('title' => 'Röd stol', 'price' => '1500'),
  'chair07' => array('title' => 'Svart stol', 'price' => '3600'),
  'chair08' => array('title' => 'Svart stol', 'price' => '2700'),
  'chair09' => array('title' => 'Svart stol', 'price' => '2400'),
  'chair10' => array('title' => 'Svart stol', 'price' => '3100'),
  'chair11' => array('title' => 'Svart stol', 'price' => '1650'),
  'chair12' => array('title' => 'Svart stol', 'price' => '2400')
);


// Action to add item in shopping cart
if ($action == 'add' && !empty($_POST['itemid'])) {
  $itemid = $_POST['itemid'];
  $price = $items[$itemid]['price'];
  $title = $items[$itemid]['title'];

  if(isset($_SESSION['cart']['items'][$itemid])) {
    $_SESSION['cart']['items'][$itemid]['numitems']++;
    $_SESSION['cart']['items'][$itemid]['sum'] += $price;
  } else {
    $_SESSION['cart']['items'][$itemid] = array('numitems' => 1, 'sum' => $price, 'title' => $title);
  }

  $_SESSION['cart']['numitems']++;
  $_SESSION['cart']['sum'] += $price;
}


// Action to remove item from shopping cart



// Draw html table of items  by using a view/template file
$items = $_SESSION['cart']['items'];

$rows = null;
foreach($items as $key => $val) {
  $rows .= "<tr><td>{$val['title']}</td><td>{$val['numitems']}</td><td>{$val['sum']} kr</td></tr>\n";
}
  

$items = $_SESSION['cart']['content'] = <<<EOD
<table>
  <tr><th>Vara</th><th>Antal</th><th>Summa</th></tr>
  {$rows}
</table>

EOD;



// Print out the content of the shopping cart
echo json_encode($_SESSION['cart']);

