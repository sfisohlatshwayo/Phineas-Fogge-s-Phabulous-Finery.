<HTML>
<HEAD>
<TITLE>Phineas Fogge's Phabulous Finery</TITLE>
<style>
body {
	font-family:'sans-serif';
	font-size:10pt;
}
tr {
	background:#ffffff;
}
th {
	background:#777777;
	color:#ffffff;
}
#hdg {
	background-image: url(rain_lin.gif);
	width:520;
	padding:10px;
	color:#ffffff;
	text-align:center;
	font-family:'serif';
	font-size:24pt;
	font-weight:bold;
}
</style>
</HEAD>
<BODY>
<p id='hdg'>Phineas Fogge's Phabulous Finery.</p>
<h2 id='2h'>Order Form.</h2>
<FORM action="getOrder.php" method="post">
<table cellspacing=1 cellpadding=5 border=0 
	style="background:#000000;width:450px;font-size:10pt">
<tr><th colspan=3>JEWELLERY ITEMS</th></tr>
<tr><th>Product</th><th>Price</th><th>Quantity</th></tr>
<?php
include("dbconn.inc");
$recset = mysql_query("SELECT * FROM Product ORDER BY ProductName");
$hold = "";
if($recset){
    while($row = mysql_fetch_assoc($recset)){
        $hold .= "<tr><td>$row[ProductName]</td><td>".
            "$row[ProductPrice]</td><td align='center'>".
            "<input type='text' name='pid".
            "$row[ProductID]' size=3></td></tr>";
    }
} else {
    exit("Cannot access product records: ".mysql_error());
}
mysql_close();
echo $hold;
?>
</table>
<p><input type="submit" value="Submit Order"></p>
</FORM>
</BODY>
</HTML>
