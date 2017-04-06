<html>
<head>
<title>Fogge Inc. Admin - View and Edit Products</title>
<style>
body {font-family:sans-serif;font-size:9pt}
table {font-family:sans-serif;font-size:9pt}
</style>
</head>
<body>
<h2>Fogge Inc. Admin  - View and Edit Products.</h2><hr>
<p><b>Click on any Product ID to edit that product.</b></p>
<?php
if ($_COOKIE['logged']) {

	include ("dbconn.inc");
	$strTable = "<table cellspacing=1 cellpadding=4 border=0 bgcolor='#000000'>
		<tr bgcolor='#cccccc'><th>Product ID</th><th>Product Name</th><th>
		Product Price</th></tr>";
	$ff = "";
	switch ($_GET[ord]){
		case 1:
			$ff = "ProductID";
			break;
		case 2:
			$ff = "ProductName";
			break;
		case 3:
			$ff = "ProductPrice";
			break;
	}
	$recset = mysql_query("SELECT * FROM Product ORDER BY $ff");
	if(mysql_num_rows($recset) > 0){
		while($row = mysql_fetch_assoc($recset)){
			$strTable .= "<tr bgcolor='#ffffff'><td align='center'><a href='editProd.php?
			pid=$row[ProductID]'>$row[ProductID]</a></td><td>$row[ProductName]</td>
			<td align='right'>$row[ProductPrice]</td></tr>";
		}
		$strTable .= "<tr bgcolor='#ffffff'><td colspan=3><b>Order by:</b>&nbsp;&nbsp;
			<a href='prods.php?ord=1'>Product ID</a>&nbsp;<a href='prods.php?ord=2'>
			Product name</a> <a href='prods.php?ord=3'>Product price</a></td></tr>";
	} else {
		$strTable .= "<tr bgcolor='#ffffff'><td colspan=3><b>No Products Found.</b></td></tr>";
	}
	echo $strTable."</table>";
	
	mysql_free_result($recset);
	mysql_close($link);
	
} else {
	echo "<p style='color:#ff0000;font-weight:bold'>Unauthorised access!</p>";	
}
?>
<p><a href="menu.php">Back to Main Menu</a></p>

</body>
</html>