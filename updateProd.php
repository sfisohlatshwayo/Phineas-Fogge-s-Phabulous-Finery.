<html>
<head>
<title>Fogge Inc. Admin - Update Product</title>
<style>
body {font-family:sans-serif;font-size:9pt}
table {font-family:sans-serif;font-size:9pt}
</style>
</head>
<body>
<h2>Fogge Inc. Admin  - Update Product.</h2><hr>
<?php
if ($_COOKIE['logged']) {
	if($_COOKIE['level'] <= 2){

		include ("dbconn.inc");
		
		$strSQL = "UPDATE Product SET ProductName = '$_POST[pnam]', ProductPrice = 
			$_POST[ppri] WHERE ProductID = $_POST[pid]";
		$result = mysql_query($strSQL);
		if($result){
			echo "<p><b>Product no. $_POST[pid] successfully updated.</b></p>";
		} else {
			echo "<p style='color:#ff0000;font-weight:bold'>Could not update product 
				$_POST[pid]: ".mysql_error()."</p>";
		}
		
		mysql_close($link);
	} else {
		echo "<p style='color:#ff0000;font-weight:bold'>Unauthorised access!</p>";
	}
} else {
	echo "<p style='color:#ff0000;font-weight:bold'>Unauthorised access!</p>";	
}
?>
<p><a href="prods.php?ord=1">Back to View Products</a></p>
<p><a href="menu.php">Back to Main Menu</a></p>

</body>
</html>