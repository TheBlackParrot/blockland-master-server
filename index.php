<?php
	include_once "includes/db_connect.php";

	$query = "SELECT * FROM servers";
	$result = mysqli_query($mysqli,$query);

	header('Content-type: text/plain');
	echo "FIELDS\tIP\tPORT\tPASSWORDED\tDEDICATED\tSERVERNAME\tPLAYERS\tMAXPLAYERS\tMAPNAME\tBRICKCOUNT";
	echo "\r\nSTART";

	while($row = mysqli_fetch_array($result))
		echo "\r\n" . $row['IP'] . "\t" . $row['PORT'] . "\t" . $row['PASSWORDED'] . "\t" . $row['DEDICATED'] . "\t" . $row['SERVERNAME'] . "\t" . $row['PLAYERS'] . "\t" . $row['MAXPLAYERS'] . "\t" . $row['GAMEMODE'] . "\t" . $row['BRICKCOUNT'];

	echo "\r\nEND";
?>