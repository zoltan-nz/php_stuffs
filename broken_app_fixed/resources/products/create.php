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

$tastes = array(
    ['id'=>'Sweet', 'name' =>'Sweet'],
    ['id'=>'Sour', 'name'  =>'Sour'],
    ['id'=>'Savoury', 'name'=>'Savoury'],
);



include(TEMPLATE_PATH . "/layout/header.php");

if (!empty($_FILES['image']['name']))
{
    var_dump($_FILES);

    $info = pathinfo($_FILES['image']['name']);
    $ext = $info['extension']; // get the extension of the file
    $random_name = substr(md5(uniqid(mt_rand(), true)), 0, 8).'.'.$ext;

    $target = $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$random_name;
    move_uploaded_file( $_FILES['image']['tmp_name'], $target);

    $imagefile_url = '/uploads/'.$random_name;
}


if (!empty($_POST))
{

    $name = trim(strip_tags($_POST['name']));
    $mf_id = (int) trim(strip_tags($_POST['mf_id']));
    $country_id = (int) trim(strip_tags($_POST['country_id']));
    $price = (float) trim(strip_tags($_POST['price']));
    $taste = strip_tags($_POST['taste']);
    $description = strip_tags($_POST['description']);

    if ($name == '') {
        $_SESSION['error'] = 'Name cannot be blank.';
    }
    else
    {
        $product = [
            'name'      => $name,
            'mf_id'     => $mf_id,
            'country_id'=> $country_id,
            'price'     => $price,
            'taste'     => $taste,
            'description' => $description,
            'imagefile_url' => $imagefile_url
        ];
        if (productSave($product))
        {
            $_SESSION['success'] = 'Product was created.';
            header("Location: /resources/products/index.php");
        }
        else
        {
            $_SESSION['error'] = 'There was a problem with saving data in database.';
        }
    }
}

?>

<?php echo product_link_to_index() ?>

<h1>Add New Product</h1>

<form class='form-horizontal' action="/resources/products/create.php" method="post" enctype='multipart/form-data'>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="name">Name*: </label>
        <div class="col-sm-4">
            <input name='name' class="form-control" type="text" placeholder="ex. Carrot Cake" required="true" value="<?php echo $product['name'] ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="name">Price: </label>
        <div class="col-sm-4">
            <input name='price' class="form-control" type="number" placeholder="ex. 3.75" value="<?php echo $product['price'] ?>" pattern="[0-9]+([\.|,][0-9]+)?" step="0.01" title="This should be a number with up to 2 decimal places."/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="name">Taste: </label>
        <div class="col-sm-4">

            <?php echo form_select('taste', $tastes, $product['taste']) ?>

        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="description">Description: </label>
        <div class="col-sm-4">
            <input id='description' name='description' class="form-control" type="text" value="<?php echo $product['description'] ?>"/>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="mf_id">Manufacturer: </label>
        <div class="col-sm-4">
            <?php echo form_select('mf_id', mfAll(), $product['mf_id']); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="country_id">Country: </label>
        <div class="col-sm-4">
            <?php echo form_select('country_id', countryAll(), $product['country_id']) ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="image">Image: </label>
        <div class="col-sm-4">
            <input id='image' name='image' class="form-control" type="file"/>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
            <button type="submit" class="btn btn-primary">Create Product</button>
        </div>
    </div>
</form>