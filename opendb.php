	<?php
	// Link to database coursedb and get ready for queries

		// Declare variables
		$DBSERVER="172.16.186.2";
		$DBUSER="coursedb";
		$DBPASS="G11Nelson";
		$DATABASE="coursedb";

		// link to the database coursedb and check connections
		$link = new mysqli($DBSERVER, $DBUSER, $DBPASS, $DATABASE);
		// Check connection
		if ($link->connect_error) {
			die("Connection failed: " . $link->connect_error);
		} 		