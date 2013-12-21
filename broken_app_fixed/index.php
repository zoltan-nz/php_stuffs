<?php

session_start();

define ("MY_APP", 1);
define ("APPLICATION_PATH", $_SERVER['DOCUMENT_ROOT'] . "/application");
define ("TEMPLATE_PATH", APPLICATION_PATH . "/view");

$activeHome = 'active';

include(TEMPLATE_PATH . "/layout/header.php");


include(APPLICATION_PATH . "/inc/config.inc.php");
include(APPLICATION_PATH . "/inc/db.inc.php");
include(APPLICATION_PATH . "/inc/functions.inc.php");
include(APPLICATION_PATH . "/inc/queries.inc.php");
include(APPLICATION_PATH . "/inc/ui_helpers.inc.php");


?>

    <div class="row">
        <div class="col-md-6">

            <?php if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) { ?>
                <h1>You are logged in</h1>

                <a href="logout.php" class="btn btn-info">Log out</a></li>
            <?php } else { ?>
                <h1>Firstly, please login</h1>
                <form class="form-horizontal" action="login.php" method="POST">

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="username">Username:</label>

                        <div class="col-md-4">
                            <input type="text" id="username" name="username" class="form-control"
                                   placeholder="Try with 'admin'"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-2 control-label" for="password">Password:</label>

                        <div class="col-md-4">
                            <input type="password" id="password" name="password" class="form-control"
                                   placeholder="Try with 'letmein'"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-4">
                            <button type="submit" value="Login" class="btn btn-success"/>
                            Log in</button>
                        </div>
                    </div>


                </form>
            <?php } ?>

            <h1>Secondly, you can manage</h1>
<ul>
            <li>...products</li>

            <li>...manufacturers,</li>

            <li>you can upload images</li>

            <li>...listing countries.</li>
</ul>

        </div>

        <div class="col-md-6">
            <div class="well">

                <h2>Original Project Notes</h2>

                <p>This project creates a list of confectionary products</p>

                <p>Fix the errors, configure and rebuild this project so that it allows you to: </p>
                <ol>
                    <li>List all products in the database
                    <li>Add products to the database
                    <li>Remove products from the database
                    <li>Add manufacturers to the database
                    <li>Remove manufacturers from the database
                    <li>Upload product images with each listing
                    <li>Add a NEW field to products showing country of origin. This can be text field or a select list.
                        If using a select list, no more than 6 countries are required. Ensure updates handle the new
                        country field.
                </ol>

                The sql setup is contained in the sqlsetup folder.
            </div>


        </div>


    </div>






<?php
include(TEMPLATE_PATH . "/layout/footer.php");
?>