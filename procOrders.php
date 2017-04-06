<html>
<head>
<title>Fogge Inc. Admin - Process New Orders</title>
<style>
body {font-family:sans-serif;font-size:9pt}
table {font-family:sans-serif;font-size:9pt}
</style>
</head>
<body>
<h1>Fogge Inc. Admin  - Process New Orders.</h1><hr>
<?php
if ($_COOKIE['logged']) {

	include ("dbconn.inc");
	$msg1 = "";
	$msg2 = "";
	$ctrl = "";
	
	$strSQL1 = "UPDATE Orders SET OrderFilled = 'Y' WHERE OrderID = ";
	$strSQL2 = "UPDATE Orders SET OrderNotes = '";
	foreach ($_POST as $key => $val){
		$ctrl = substr($key,0,3);
		if ($ctrl == "ont") {
			if ($val != "") {
				$result = mysql_query($strSQL2.$val."' WHERE OrderID = ".substr($key,3));
				if($msg2 == ""){
					$msg2 .= substr($key,3);
				} else {
					$msg2 .= ", ".substr($key,3);
				}
			}
		} else {
			$result = mysql_query($strSQL1.substr($key,3));
			if ($result) {
				if($msg1 == ""){
					$msg1 .= substr($key,3);
				} else {
					$msg1 .= ", ".substr($key,3);
				}
			}
		}
	}
	if($msg1 != ""){
		echo "<br><b>Order numbers $msg1 filled and completed.</b><br>";
	} 
	if($msg2 != ""){
		echo "<br><b>Order numbers $msg2 updated.</b>";
	}
	if($msg1 == "" && $msg2 == "") {
		echo "<br><b>No new orders filled or updated.</b>";
	}
	
	mysql_close($link);
	
} else {
	echo "<p style='color:#ff0000;font-weight:bold'>Unauthorised access!</p>";	
}
?>
<p><a href="menu.php">Back to Main Menu</a></p>
</body>
</html>