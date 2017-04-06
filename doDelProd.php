<html>
<head>
<title>Fogge Inc. Admin - Remove Product</title>
<style>
body {font-family:sans-serif;font-size:9pt}
table {font-family:sans-serif;font-size:9pt}
</style>
</head>
<body>
<h2>Fogge Inc. Admin  - Remove Product.</h2><hr>
<?php
if ($_COOKIE['logged']) {	
	if($_COOKIE['level'] == 1){

		include ("dbconn.inc");
		
		$result = mysql_query("DELETE FROM Product WHERE ProductID = $_POST[pid]");
		if($result){
			echo "<p><b>Product no. $_POST[pid] successfully deleted.</b></p>";
		} else {
			echo "<p style='color:#ff0000;font-weight:bold'>Unable to delete product no. 
			$_POST[pid] - ".mysql_error()."</p>";
		}
		
		mysql_close($link);
	} else {
		echo "<p style='color:#ff0000;font-weight:bold'>Unauthorised access!</p>";
	}	
} else {
	echo "<p style='color:#ff0000;font-weight:bold'>Unauthorised access!</p>";	
}
?>
<p><a href="delProd.php">Back to Delete Product</a></p>
<p><a href="menu.php">Back to Main Menu</a></p>
</body>
</html>