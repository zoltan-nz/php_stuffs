<?php

/*
 * This constant is declared in index.php
* It prevents this file being called directly
*/
defined('MY_APP') or die('Restricted access');

die('boom');
$link_id=@mysql_connect(DB_HO,DB_USE,DB_PASSWOR);
if($link_id) {
	
	die("Successful Connection");
} else {

	//echo "UnSuccessful Connection: " . DB_HOST;
	EXIT;
}

if(mysql_select_db(DB_DATABASE,$link_id)) {
	//echo "<p>Connection to database successful </p>";
	header("Location: http://www.ryanair.com");
} else {

	//echo "<p>Connection to database failed  </p>";
}