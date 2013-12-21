<?php

session_start();

define ("MY_APP", 1);
define ("APPLICATION_PATH", $_SERVER['DOCUMENT_ROOT']. "/application");
define ("TEMPLATE_PATH", APPLICATION_PATH . "/view");

include_once(APPLICATION_PATH . "/inc/session.inc.php");
include(APPLICATION_PATH . "/inc/config.inc.php");
include(APPLICATION_PATH . "/inc/db.inc.php");
include(APPLICATION_PATH . "/inc/functions.inc.php");

$activeAdminHome = "active";

include(TEMPLATE_PATH . "/layout/header.php");

?>
<div class="container">
    <div class="row">
        <div class="span12">
            <h1>Admin Home</h1>

            <p>Choose your activity</p>
        </div>

        <div class="span6">
            <h4>Manage Products</h4>
            <a class="btn btn-success" href="resources/products/index.php">Products</a>
        </div>

        <div class="span6">
            <h4>Manage Manufacturers</h4>
            <a class="btn btn-warning" href="resources/manufacturers/index.php">Manufacturers</a>
        </div>

    </div>

</div>
<?php
include(TEMPLATE_PATH . "/layout/footer.php");
?>
