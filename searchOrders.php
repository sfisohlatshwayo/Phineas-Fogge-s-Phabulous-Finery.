<html>
<head>
<title>Fogge Inc. Admin - Search Orders</title>
<style>
body {font-family:sans-serif;font-size:9pt}
table {font-family:sans-serif;font-size:9pt}
</style>
</head>
<body>
<h1>Fogge Inc. Admin  - Search Orders.</h1><hr>
<?php
if ($_COOKIE['logged']) {

	include ("dbconn.inc");
	$strSQL = "SELECT * FROM Orders WHERE ";
	$hold = "<p><b>Search Results for ";
	
	switch ($_POST["flag"]){
		case 1:
			$strSQL .= "OrderID = $_POST[onum]";
			$hold .= "OrderID $_POST[onum]</b></p>";
			break;
		case 2:
			$strSQL .= "CustomerName LIKE '%$_POST[cnam]%'";
			$hold .= "Customer Name '$_POST[cnam]'</b></p>";
			break;
		case 3:
			$strSQL .= "CustomerAddress LIKE '%$_POST[cadr]%'";
			$hold .= "Customer Address '$_POST[cadr]'</b></p>";
			break;
	}

	$recset = mysql_query($strSQL);
	if(mysql_num_rows($recset) > 0){
		while($row = mysql_fetch_assoc($recset)){
			$hold .="<p>Order ID: $row[OrderID]<br>Customer name: $row[CustomerName]<br>".
			"Customer address: $row[CustomerAddress]<br><br>".
			"$row[OrderText]<br>Notes: $row[OrderNotes]<br>Order filled: $row[OrderFilled]</p>";
		}
		echo $hold;
	} else {
		echo "<p style='color:#ff0000;font-weight:bold'>No matching records found.</p>";
	}
	mysql_free_result($recset);
	mysql_close($link);
	
} else {
	echo "<p style='color:#ff0000;font-weight:bold'>Unauthorised access!</p>";	
}
?>
<p><a href="findOrd.php">Back to Find Order</a></p>
<p><a href="menu.php">Back to Main Menu</a></p>
</form>
</body>
</html>