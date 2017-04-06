<html>
<head>
<title>Fogge Inc. Admin - Delete Product</title>
<style>
body {font-family:sans-serif;font-size:9pt}
table {font-family:sans-serif;font-size:9pt}
</style>
<script language='javascript'>
function subm(){
	if(parseInt(frm1.pid.value) > 0){
		var result = confirm("Delete product?");
		if(result){
			return true;
		} else {
			return false;
		}
	} else {
		return false;
	}
}
</script>
</head>
<body>
<h2>Fogge Inc. Admin  - Delete Product.</h2><hr>
<p><b>Select a product for deletion from the list below:</b></p>
<form id="frm1" action="doDelProd.php" method="POST" onsubmit="return subm()">
<?php
if ($_COOKIE['logged']) {	
	if($_COOKIE['level'] == 1){

		include ("dbconn.inc");
		$str = "<p><select name='pid'><option value=0></option>";
		
		$recset = mysql_query("SELECT ProductID, ProductName FROM Product ORDER BY ProductName");
		if(mysql_num_rows($recset) > 0){
			while($row = mysql_fetch_assoc($recset)){
				$str .= "<option value=$row[ProductID]>$row[ProductName]</option>";
			}
		} else {
			echo "<p style='color:#ff0000;font-weight:bold'>No users found!</p>";
		}
		$str .= "<select>";
		echo $str;
		
		mysql_free_result($recset);
		mysql_close($link);
	} else {
		echo "<p style='color:#ff0000;font-weight:bold'>Unauthorised access!</p>";
	}	
} else {
	echo "<p style='color:#ff0000;font-weight:bold'>Unauthorised access!</p>";	
}
?>
<p><input type="submit" value="Delete"></p>
</form>
<p><a href="menu.php">Back to Main Menu</a></p>
</form>
</body>
</html>