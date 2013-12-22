<?php

defined('MY_APP') or die('Restricted access');

function authenticate($username, $password)
{

    $sqlQuery = "SELECT * from adminusers WHERE ";
    $sqlQuery .= "username = '" . mysql_real_escape_string($username) . "'";
    $sqlQuery .= " AND ";
    $sqlQuery .= "password = '" . mysql_real_escape_string($password) . "'";

    $result = mysql_query($sqlQuery);

    if ($result) {

        if (mysql_num_rows($result) == 1) {
            return true;
        }

    } else {
        $_SESSION['error'] = mysql_error();
        return false;
    }

}