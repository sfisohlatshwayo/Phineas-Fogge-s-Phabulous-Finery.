<html>
<head>
<title>Fogge Inc. Admin - Find Order</title>
<style>
body {font-family:sans-serif;font-size:9pt}
table {font-family:sans-serif;font-size:9pt}
</style>
</head>
<body>
<h1>Fogge Inc. Admin  - Find Order.</h1><hr>
<form action="searchOrders.php" method="post">
<p>Use the form below to supply an order number, customer's name, or a customer's address to 
locate orders.<br>If using customer name or address, the computer will search based 
on likely matches, so if you only know<br>part of the name/address it doesn't matter.<br>
Only one type of search can be executed at any one time.</p>

<?php
if ($_COOKIE['logged']) {
	
?>

<p><input type="text" name="onum"> Order number</p>
<input type="hidden" name="flag" value="1">
<p><input type="submit" value="Submit"></form></p>

<form action="searchOrders.php" method="post">
<p><input type="text" name="cnam"> Customer name</p>
<input type="hidden" name="flag" value="2">
<p><input type="submit" value="Submit"></form></p>

<form action="searchOrders.php" method="post">
<p><input type="text" name="cadr" size="60"> Customer address</p>
<input type="hidden" name="flag" value="3">
<p><input type="submit" value="Submit"></form></p>

<?php
	
} else {
	echo "<p style='color:#ff0000;font-weight:bold'>Unauthorised access!</p>";	
}
?>
<p><a href="menu.php">Back to Main Menu</a></p>
</form>
</body>
</html>