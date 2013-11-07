<?php
$host="localhost"; // Host name
$username="root"; // Mysql username
$password="123123"; // Mysql password
$db_name="cw_users"; // Database name


	$con = mysql_connect($host,$username,$password)   or die(mysql_error());
	mysql_select_db($db_name, $con)  or die(mysql_error());

$q = strtolower($_GET["q"]);
if (!$q) return;

$sql = "select DISTINCT user_name as usr from cw_users where user_name LIKE '%$q%' AND user_level < 5";
$rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['usr'];
	echo "$cname\n";
}
?>
