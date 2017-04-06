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
<h2 id='2h'>Checkout.</h2>
Thank you for your order<b>
<?php
echo "$_POST[nam]";
?>
</b>.<p>Your order as follows in the table below will be dispatched COD to:<p>
<textarea readonly cols="40" rows="5">
<?php
echo "$_POST[postal]";
?>
</textarea></p><p>
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
			if($val != "" && $val != 0){
				$hold .="<tr>";
				$cost = $val * $val2;
				$total += $cost;
				$hold .= "<td>".removeUnderscore($key)."</td><td>$val</td><td>$cost</td>";
				$hold .="</tr>";
			}
		}
	}
}
echo $hold."<tr><th colspan=2 align='right'>Total: </th><th>R $total.00</th></tr>";
?>
</table></p>
</BODY>
</HTML>