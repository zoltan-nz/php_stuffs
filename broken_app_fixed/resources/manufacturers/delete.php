<?php

session_start();

define ("MY_APP", 1);
define ("APPLICATION_PATH", $_SERVER['DOCUMENT_ROOT'] . "/application");
define ("TEMPLATE_PATH", APPLICATION_PATH . "/view");

include_once(APPLICATION_PATH . "/inc/session.inc.php");
include(APPLICATION_PATH . "/inc/config.inc.php");
include(APPLICATION_PATH . "/inc/db.inc.php");
include(APPLICATION_PATH . "/inc/functions.inc.php");
include(APPLICATION_PATH . "/inc/queries.inc.php");
include(APPLICATION_PATH . "/inc/ui_helpers.inc.php");

if (!empty($_GET))
{
    $id = (int) ($_GET['id']);
    $ids = array_column(mfAll(), 'id');

    if ($id == '' or !in_array($id, $ids)) {
        $_SESSION['error'] = 'Invalid ID.';
    }
    else
    {

        if (mfDelete($id))
        {
            $_SESSION['success'] = 'Manufacturer was deleted.';
        }
        else
        {
            $_SESSION['error'] = 'There was a problem with deleting in database.';
        }
    }
}