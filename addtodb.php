<?PHP
	// This is a simple cron script you can use to track
	// your location over time. It uses the MySQL schema
	// pasted below.
	
	// CREATE TABLE `history` (
	//   `dt` datetime NOT NULL,
	//   `lat` decimal(10,6) NOT NULL,
	//   `lng` decimal(10,6) NOT NULL,
	//   UNIQUE KEY `dt` (`dt`)
	// )

	
	if(strlen($iphoneLocation->latitude))
	{
		$db = mysql_connect('localhost', $dbUsername, $dbPassword);
		mysql_select_db('sosumi', $db) or die(mysql_error());

		$dt = date('Y-m-d H:i:s', strtotime($loc->date . ' ' . $loc->time));
		$lat = mysql_real_escape_string($iphoneLocation->latitude, $db);
		$lng = mysql_real_escape_string($iphoneLocation->longitude, $db);

		$query = "INSERT INTO history (`dt`, `lat`, `lng`) VALUES ('$dt', '$lat', '$lng')";
		mysql_query($query, $db) or die(mysql_error());
	}
