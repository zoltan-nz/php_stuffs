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

$mfIndex = "active";

include(TEMPLATE_PATH . "/layout/header.php");

?>

<h1>Add a new Manufacturer</h1>

<form class='form-horizontal' action="/resources/manufacturers/create.php" method="post">
    <div class="form-group">
        <label class="col-sm-2 control-label" for="name">Name: </label>
        <div class="col-sm-10">
            <input class="form-control" type="text" placeholder="ex. Nice Cake Ltd."/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <button type="submit" class="btn btn-primary">Add Manufacturer</button>
        </div>
    </div>
</form>