<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include('incl/cc_form.php');?>

<div id=flash><h1>Checkout</h1>
<p>The following sum will be charged on your credit card: 
<span id=sum></span> kr.</p>

<div id=output></div>
  
</div>
<?php echo $form->GetHTML(array('id' => 'form1', 'columns' => 2)) ?>


<script src="js/jquery.js"></script>
<script src="js/checkout.js"></script>
</body>
</html>
