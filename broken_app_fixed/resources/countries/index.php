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

$countryIndex = "active";

include(TEMPLATE_PATH . "/layout/header.php");

?>

    <h1>Country list</h1>

    <div class="row">
        <div class="col-md-12">


            <table class="table table-bordered table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>

                <?php $countries = countryAll();

                foreach ($countries as $country) {
                    ?>
                    <tr>
                        <td><?php echo $country['id'] ?></td>
                        <td><?php echo $country['name'] ?></td>
                    </tr>

                <?php
                }
                ?>

                </tbody>
            </table>


        </div>
    </div>

<?php
include(TEMPLATE_PATH . "/layout/footer.php");
?>