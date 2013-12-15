<?php

/*
 * This constant is declared in index.php
* It prevents this file being called directly
*/
defined('MY_APP') or die('Restricted access');

$link_id=@mysql_connect(DB_HOST,DB_USER,DB_PASSWORD);
if($link_id) {

    if(mysql_select_db(DB_DATABASE,$link_id)) {

        $_SESSION['flash'] =  "Connection to database successful";

    } else {

        $_SESSION['flash'] = "Connection to database failed";
    }

} else {

	$_SESSION['flash'] = "UnSuccessful Connection: " . DB_HOST;

}

