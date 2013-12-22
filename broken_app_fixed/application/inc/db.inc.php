<?php

defined('MY_APP') or die('Restricted access');

$link_id = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

if ($link_id) {

    if (mysql_select_db(DB_DATABASE, $link_id)) {

//        $_SESSION['flash'] =  "Connection to database successful";

    } else {

        $_SESSION['error'] = "Connection to database failed";
    }

} else {

    $_SESSION['error'] = "UnSuccessful Connection to: " . DB_HOST;

}

