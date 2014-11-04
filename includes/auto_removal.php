<?php
	include_once "db_connect.php";
	
	$query = 'SELECT IP,PORT,UPTIME FROM servers';
	$result = mysqli_query($mysqli,$query);

	while($row = mysqli_fetch_array($result))
	{
		$elapsed = time() - $row['UPTIME'];
		if($elapsed > 600)
		{
			// Server hasn't updated in 10 minutes, assume it has died.
			$query_new = 'DELETE FROM servers WHERE IP="' . $row['IP'] . '" AND PORT=' . $row['PORT'];
			$result_new = mysqli_query($mysqli,$query_new);
		}
	}
?>