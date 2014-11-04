<?php
	include_once "includes/db_connect.php";

	$query = 'SELECT * FROM servers WHERE IP="' . $_SERVER['REMOTE_ADDR'] . '" AND PORT=' . $_POST['Port'];
	$result = mysqli_query($mysqli,$query);


	if(!mysqli_num_rows($result))
	{
		$query_new = 	'INSERT INTO servers (IP,PORT,SERVERNAME,PLAYERS,MAXPLAYERS,GAMEMODE,PASSWORDED,DEDICATED,BRICKCOUNT,BLID,CSG,VER,BUILD)
						VALUES
						("' . $_SERVER['REMOTE_ADDR'] . '", ' . $_POST['Port'] . ', "' . $_POST['ServerName'] . '", ' . $_POST['Players'] . ', ' . $_POST['MaxPlayers'] . ', "' . $_POST['Map'] . '", ' . $_POST['Passworded'] . ', ' . $_POST['Dedicated'] . ', ' . $_POST['BrickCount'] . ', ' . $_POST['blid'] . ', ' . $_POST['csg'] . ', ' . $_POST['ver'] . ', ' . $_POST['build'] . ');';
	}
	else
	{
		$query_new = 	'UPDATE servers SET SERVERNAME="' . $_POST['ServerName'] . '", PLAYERS=' . $_POST['Players'] . ', MAXPLAYERS=' . $_POST['MaxPlayers'] . ', GAMEMODE="' . $_POST['Map'] . '", PASSWORDED=' . $_POST['Passworded'] . ', DEDICATED=' . $_POST['Dedicated'] . ', BRICKCOUNT=' . $_POST['BrickCount'] . ', BLID=' . $_POST['blid'] . ', CSG=' . $_POST['csg'] . ', VER=' . $_POST['ver'] . ', BUILD=' . $_POST['build'] . ', UPTIME=' . time() . ' WHERE IP="' . $_SERVER['REMOTE_ADDR'] . '" AND PORT=' . $_POST['Port'];
	}
	$result_new = mysqli_query($mysqli,$query_new);
?>