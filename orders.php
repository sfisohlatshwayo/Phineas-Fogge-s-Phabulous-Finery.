<html>
<head>
<title>Fogge Inc. Admin - New Orders</title>
<style>
body {font-family:sans-serif;font-size:9pt}
table {font-family:sans-serif;font-size:9pt}
</style>
</head>
<body>
<h1>Fogge Inc. Admin  - New Orders.</h1><hr>
<form action="procOrders.php" method="post">

<?php
if ($_COOKIE['logged']) {

	include ("dbconn.inc");
	
	$hold = "";
	$strSQL = "SELECT * FROM Orders WHERE OrderFilled = 'N'";
	$recset = mysql_query($strSQL);
	$recs = mysql_num_rows($recset);
	
	if ($recs > 0) {
		for ($k = 1; $k <= $recs; $k++){
			$row = mysql_fetch_assoc($recset);
			$hold .="<p><b>$row[OrderID].</b><br>$row[CustomerName]<br>$row[CustomerAddress]<br>".
				"$row[OrderText]<br><input type='text' value='$row[OrderNotes]' name='ont$row[OrderID]'".
				" size=60> Order notes<br><input type='checkbox' name='oid$row[OrderID]'>Filled</p>";
		}
		$hold .= "<input type='submit' value='Submit'>";
	} else {
		echo "<p><b>No new orders found.</b><p>";
	}
	
	mysql_free_result($recset);
	mysql_close($link);
	echo $hold;
	
} else {
	echo "<p style='color:#ff0000;font-weight:bold'>Unauthorised access!</p>";	
}
?>
<p><a href="menu.php">Back to Main Menu</a></p>
</form>
</body>
</html>