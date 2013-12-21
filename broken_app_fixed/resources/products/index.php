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

$productIndex = "active";

include(TEMPLATE_PATH . "/layout/header.php");

?>

    <div class="row">
        <div class="col-md-6">
            <h1>List of Products</h1>
        </div>

        <div class="col-md-6">
            <?php echo product_link_to_create(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">


            <table class="table table-bordered table-responsive" id="products-list">
                <thead>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Taste</th>
                    <th>Description</th>
                    <th>Manufacturer</th>
                    <th>Country</th>
                    <th>Actions</th>
                </thead>
                <tbody>

                <?php $products = productAll();

                foreach ($products as $product) {
                    ?>
                    <tr>
                        <td><?php echo $product['id'] ?></td>
                        <td>
                            <?php if (!$product['imagefile_url'] == '') { ?>
                                <img src="<?php echo $product['imagefile_url'] ?>" width="200" alt="Image"/>
                            <?php } ?>
                        </td>
                        <td><?php echo $product['name'] ?></td>
                        <td><?php echo $product['price'] ?></td>
                        <td><?php echo $product['taste'] ?></td>
                        <td><?php echo $product['description'] ?></td>
                        <td><?php echo mfShow($product['mf_id'])['name'] ?></td>
                        <td><?php echo countryShow($product['country_id'])['name'] ?></td>
                        <td><?php echo product_link_to_edit($product['id']) ?>
                            <?php echo product_link_to_delete($product['id']) ?>
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