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

if (!empty($_POST))
{
    $id = mysql_real_escape_string($_POST['id']);
    $name = mysql_real_escape_string($_POST['name']);

    if ($name == '') {
        $_SESSION['error'] = 'Name cannot be blank.';
    }
    else
    {
        $mf = ['id' => $id, 'name' => $name];
        if (mfUpdate($mf))
        {
            $_SESSION['success'] = 'Manufacturer was updated.';
            header("Location: /resources/manufacturers/index.php");
        }
        else
        {
            $_SESSION['error'] = 'There was a problem with saving data in database.';
        }
    }
}
{
    $mf_id = $_GET['id'];
    $mf = mfShow($mf_id);
}

?>

<?php echo mf_link_to_index() ?>

<h1>Edit Manufacturer</h1>

<form class='form-horizontal' action="/resources/manufacturers/edit.php" method="post">
    <div class="form-group">
        <label class="col-sm-2 control-label" for="name">Name: </label>
        <div class="col-sm-4">
            <input name="id" type="hidden" value="<?php echo $mf['id'] ?>">
            <input name='name' class="form-control" type="text" placeholder="ex. Nice Cake Ltd." required="true" value="<?php echo $mf['name'] ?>"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
            <button type="submit" class="btn btn-primary">Save Manufacturer</button>
        </div>
    </div>
</form>