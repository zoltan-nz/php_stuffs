<?php

session_start();

if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == 1) {

    header("Location: admin.php");

}

define ("MY_APP", 1);
define ("APPLICATION_PATH", $_SERVER['DOCUMENT_ROOT']. "/application");
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
    }
    else {
        $_SESSION['error'] = 'Login or password is not correct. Try "admin" and "letmein".';
    }


}

include(TEMPLATE_PATH . "/layout/header.php");
?>
<div class="container">

    <h1>Please login</h1>
    <form class="form-horizontal" action="login.php" method="POST">

        <div class="control-group">
            <label class="control-label" for="username">Username:</label>

            <div class="controls">
                <input type="text" id="username" name="username"/>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="password">Password</label>

            <div class="controls">
                <input type="password" id="password" name="password"/>
            </div>
        </div>


        <div class="control-group">
            <div class="controls">
                <input type="submit" value="Login" class="btn btn-primary"/>
            </div>
        </div>


    </form>


</div>

<?php
include(TEMPLATE_PATH . "/layout/footer.php");
?>