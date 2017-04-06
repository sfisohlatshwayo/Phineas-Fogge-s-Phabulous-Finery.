
<html>
<head>
<title>Fogge Inc. Admin Menu</title>
<style>
body {font-family:sans-serif;font-size:10pt}
table {font-family:sans-serif;font-size:10pt}
</style>
</head>
<body>
<h1>Fogge Inc. Admin Menu.</h1><hr>

<?php

$hold = "";

if ($_COOKIE['logged']) {
	
	$hold .= "<p><b>Please choose the Administrative Function you need below:</b></p>".
		"<ol><li><a href='orders.php'>View New Orders</a></li>".
		"<li><a href='prods.php'>View and Edit Products</a></li>".
		"<li><a href='addProd.php'>Add a New Product</a></li>".
		"<li><a href='delProd.php'>Delete a Product</a></li>".
		"<li><a href='users.php'>View and Edit Users</a></li>".
		"<li><a href='addDelUsr.php'>Add/Delete a User</a></li>".
		"</ol>";
	

} else {
	$hold .= "<p style='color:#ff0000;font-weight:bold'>Access not authorised!</p>";
}

echo $hold;

?>

</body>
</html>