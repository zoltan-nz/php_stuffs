<?php

defined('MY_APP') or die('Restricted access');

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != 1) {

    $_SESSION['error'] = "Restricted area, please login first.";

    header("Location: /index.php");
    exit;
}
