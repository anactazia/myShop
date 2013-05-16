<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div id='flash'>
  <h1>Shop</h1>
  <div id='cart'>
    <h2><img src="img/cart.gif" width="40px">Kundvagn</h2>
    <div id='content'></div>
    <p>
      Antal varor: <span id="numitems">0</span><br/>
      Total summa: <span id="sum">0</span> kr<br/><br/>
      <input id="clear" type="button" value="Töm varukorgen" />  <span id="status">Varukorgen är tom.</span><br />
     <a href="myShopCheckout.php"><span class="uppercase">Till Kassan</span></a>
    </p>
  </div>
  <table>
    <tr><th></th><th></th><th>Pris</th><th>Köp</th></tr>
    <tr><td><img class="shopimg" src="img/chair01.jpg"></td><td></td><td>2000 kr</td><td><button id='chair01' class="purchase">Köp</button></td></tr>
    <tr><td><img class="shopimg" src="img/chair02.jpg"></td><td></td><td>2500 kr</td><td><button id='chair02' class="purchase">Köp</button></td></tr>
    <tr><td><img class="shopimg" src="img/chair03.jpg"></td><td></td><td>1850 kr</td><td><button id='chair03' class="purchase">Köp</button></td></tr>
    <tr><td><img class="shopimg" src="img/chair04.jpg"></td><td></td><td>3000 kr</td><td><button id='chair04' class="purchase">Köp</button></td></tr>
    <tr><td><img class="shopimg" src="img/chair05.jpg"></td><td></td><td>2800 kr</td><td><button id='chair05' class="purchase">Köp</button></td></tr>
    <tr><td><img class="shopimg" src="img/chair06.png"></td><td></td><td>1500 kr</td><td><button id='chair06' class="purchase">Köp</button></td></tr>
    <tr><td><img class="shopimg" src="img/chair07.jpg"></td><td></td><td>3600 kr</td><td><button id='chair07' class="purchase">Köp</button></td></tr>
    <tr><td><img class="shopimg" src="img/chair08.jpg"></td><td></td><td>2700 kr</td><td><button id='chair08' class="purchase">Köp</button></td></tr>
    <tr><td><img class="shopimg" src="img/chair09.jpg"></td><td></td><td>2400 kr</td><td><button id='chair09' class="purchase">Köp</button></td></tr>
    <tr><td><img class="shopimg" src="img/chair10.jpg"></td><td></td><td>3100 kr</td><td><button id='chair10' class="purchase">Köp</button></td></tr>
    <tr><td><img class="shopimg" src="img/chair11.jpg"></td><td></td><td>1650 kr</td><td><button id='chair11' class="purchase">Köp</button></td></tr>
    <tr><td><img class="shopimg" src="img/chair12.jpg"></td><td></td><td>2400 kr</td><td><button id='chair12' class="purchase">Köp</button></td></tr>
  </table>

</div>


<script src="js/jquery.js"></script>
<script src="js/shop.js"></script>
</body>
</html>
