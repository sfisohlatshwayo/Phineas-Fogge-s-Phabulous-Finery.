
<?php

$hold = "<html><head><title>Fogge Inc. Admin Menu</title></head>".
	"<body><h1>Fogge Inc. Admin Menu.</h1><hr>";

include ("dbconn.inc");

$strSQL = "SELECT * FROM Users WHERE UserName = '$_POST[user]' " .
	"AND UserPassword = '$_POST[pwd]'";
$recset = mysql_query($strSQL);

$recs = mysql_num_rows($recset);
if($recs == 1){
	//set the cookie
	$row = mysql_fetch_assoc($recset);
	setcookie("logged",1);
	setcookie("level",$row["UserLevelID"]);
	$hold .= "<p><b>You are logged in ".$row["UserFullName"].".";
} else if($recs > 1){
	$hold .= "<p style='color:#ff0000;font-weight:bold'>Access not authorised!<br>".
		"Your login details have been duplicated on the system - please contact ".
		"the System Administrator.</p>";
} else {
	$hold .= "<p style='color:#ff0000;font-weight:bold'>Access not authorised!</p>";
}
mysql_free_result($recset);
mysql_close($link);

echo $hold;

?>

</body>
</html>