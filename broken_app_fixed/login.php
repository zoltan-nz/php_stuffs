<?php

session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {

    header("Location: admin.php");

}

define ("MY_APP", 1);
define ("APPLICATION_PATH", $_SERVER['DOCUMENT_ROOT'] . "/application");
define ("TEMPLATE_PATH", APPLICATION_PATH . "/view");

include(APPLICATION_PATH . "/inc/config.inc.php");
include(APPLICATION_PATH . "/inc/db.inc.php");
include(APPLICATION_PATH . "/inc/functions.inc.php");

$activeLogin = 'active';

function login($username, $password)
{

    return authenticate($username, $password);
}

if (!empty($_POST)) {

    $s_username = htmlspecialchars($_POST['username']);
    $s_password = $_POST['password'];
    if (login($s_username, $s_password)) {

        $_SESSION["loggedIn"] = 1;
        $_SESSION['success'] = 'You are successfully logged in.';
        header("Location: admin.php");
    } else {
        $_SESSION['error'] = 'Login or password was incorrect. Try "admin" and "letmein".';
    }


}

include(TEMPLATE_PATH . "/layout/header.php");
?>
    <div class="container">

        <h1>Please login</h1>

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
                    <button type="submit" value="Login" class="btn btn-default"/>
                    Log in</button>
                </div>
            </div>


        </form>


    </div>

<?php
include(TEMPLATE_PATH . "/layout/footer.php");
?>