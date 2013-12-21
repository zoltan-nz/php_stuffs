<?php

defined('MY_APP') or die('Restricted access');


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != 1) {

    $_SESSION['error'] = "Restricted area, please login first.";

    header("Location: /index.php");
    exit;
}
