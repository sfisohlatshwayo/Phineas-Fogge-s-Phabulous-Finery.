<html>
<head>
<title>Fogge Inc. Admin - Edit Product</title>
<style>
body {font-family:sans-serif;font-size:9pt}
table {font-family:sans-serif;font-size:9pt}
</style>
<script language="javascript">
function subm(){
	if(frm1.pnam.value == "" || frm1.ppri.value == ""){
		alert("No fields may be empty!");
		return false;
	}
	if(isNaN(frm1.ppri.value)){
		alert("Please enter a valid price!");
		return false;
	}
	return true;
}
</script>
</head>
<body>
<h2>Fogge Inc. Admin  - Edit Product.</h2><hr>
<p><b>Make the required changes in the text control data, and then submit the form.</b></p>
<form id="frm1" action="updateProd.php" method="post" onsubmit="return subm()">
<?php
if ($_COOKIE['logged']) {
	if($_COOKIE['level'] <= 2){

		include ("dbconn.inc");
		
		$recset = mysql_query("SELECT * FROM Product WHERE ProductID = $_GET[pid]");
		$row = mysql_fetch_assoc($recset);
		echo "<p><input type='text' name='pnam' size=60 value='$row[ProductName]'> Product name</p>
			<p><input type='text' name='ppri' size=10 value='$row[ProductPrice]'> Product price</p>
			<input type='hidden' name='pid' value='$_GET[pid]'><p><input type='submit' value='Submit'>
			</form>";
		
		mysql_free_result($recset);
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
</form>
</body>
</html>