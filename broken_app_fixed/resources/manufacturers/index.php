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

<div class="row">
    <div class="col-md-6">
        <h1>List of Manufacturers</h1>
    </div>

    <div class="col-md-6">
        <?php mf_link_to_create(); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">


        <table class="table table-bordered table-responsive">
            <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
            </thead>
            <tbody>

            <?php $manufacturers = mfAll();

            foreach ($manufacturers as $mf) {
                ?>
                <tr>
                    <td><?php echo $mf['id'] ?></td>
                    <td><?php echo $mf['name'] ?></td>
                    <td><?php echo mf_link_to_edit($mf['id']) ?>
                        <?php echo mf_link_to_delete($mf['id']) ?>
                    </td>

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