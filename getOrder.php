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
<h2 id='2h'>Your Order.</h2>
<p>To change the quantity of any item, change the number in the quantity column.<br>
To delete an item set the quantity to zero.</p>
<FORM action="checkout.php" method="POST">
<table border=1 cellspacing=0 cellpadding=4>
<tr><th>Item</th><th>Quantity</th><th>Cost</th></tr>
<?php
function removeUnderscore($str){
	$result = "";
	for ($k = 0;$k < strlen($str);$k++){
		if(substr($str,$k,1) == "_"){
			$result .= " ";
		} else {
			$result .= substr($str,$k,1);
		}
	}
	return $result;
}

$hold = "";
$cost = 0;
$total = 0;
$items = array("Pearl_earrings" => 5000, "Diamond_brooch" => 12000, 
			"Platinum_Tanzanite_ring" => 7500, "Gold_Tanzanite_ring" => 3900);
foreach($_POST as $key => $val){
	foreach ($items as $key2 => $val2){
		if($key == $key2){
			if($val != ""){
				$hold .="<tr>";
				$cost = $val * $val2;
				$total += $cost;
				$hold .= "<td>".removeUnderscore($key)."</td>".
				  "<td><input type='text' size=3 name='$key' value='$val'></td>".
				  "<td>$cost</td>";
				$hold .="</tr>";
			}
		}
	}
}
echo $hold."<tr><th colspan=2 align='right'>Total: </th><th>$total</th></tr>";
?>
</table>
<p><input type="text" name="nam" size=40> Please enter your full name</p>
<p>Please enter your postal adress:<br>
<textarea name="postal" cols=50 rows=5></textarea></p>
<p><input type="submit" value="Checkout >>"></p>
</FORM>
</BODY>
</HTML>