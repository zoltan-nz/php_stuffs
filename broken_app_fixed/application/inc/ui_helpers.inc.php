<?php

defined('MY_APP') or die('Restricted access');

define('RESOURCES',         '/resources');

define('MANUFACTURERS',     RESOURCES.'/manufacturers');
define('PRODUCTS',          RESOURCES.'/products');
define('COUNTRIES',         RESOURCES.'/countries');


function uihelperSelect($selectID, $arrayItems, $selectedItem = "") {
	

	$htmlString = "<select id='$selectID' name='$selectID'>";
	foreach($arrayItems as $option) {
		
		$optionLabel = $option["label"];
		$optionID = $option["id"];
		
		$selected = $optionID == $selectedItem ? " selected " : "";
		
		
		$htmlString .= "<option value='$optionID' $selected>$optionLabel</option>";
	
	}
	
	$htmlString .= "</select>";
	
	return $htmlString;
}

function product_link_to_index()
{
    return "<a href='".PRODUCTS.'/index.php'."' class='btn btn-success'><< Back to Products</a>";
}

function product_link_to_create()
{
    return "<a href='".PRODUCTS.'/create.php'."' class='btn btn-success'>Add new Product</a>";
}

function product_link_to_edit($id)
{
    return "<a href='".PRODUCTS.'/edit.php'."?id=$id' class='btn btn-info'>Edit</a>";
}

function product_link_to_delete($id)
{
    return "<a href='".MANUFACTURERS.'/delete.php'."?id=$id'>Delete</a>";
}

function mf_link_to_index()
{
    return "<a href='".MANUFACTURERS.'/index.php'."' class='btn btn-link'><< Back to Manufacturers</a>";
}

function mf_link_to_create()
{
    echo "<a href='".MANUFACTURERS.'/create.php'."' class='btn btn-success pull-right'>Add new Manufacturers</a>";
}

function mf_link_to_edit($id)
{
    return "<a href='".MANUFACTURERS.'/edit.php'."?id=$id' class='btn btn-info'>Edit</a>";
}

function mf_link_to_delete($id)
{
    return "<a href='".MANUFACTURERS.'/delete.php'."?id=$id' class='btn btn-danger js-delete'>Delete</a>";
}

function country_link_to_index()
{
    return "<a href='".COUNTRIES.'/index.php'."' class='btn btn-link'><< Back to Manufacturers</a>";
}

function country_link_to_create()
{
    return "<a href='".COUNTRIES.'/create.php'."' class='btn btn-success'>Add new Manufacturers</a>";
}

function country_link_to_edit($id)
{
    return "<a href='".COUNTRIES.'/edit.php'."?id=$id' class='btn btn-info'>Edit</a>";
}

function country_link_to_delete($id)
{
    return "<a href='".COUNTRIES.'/delete.php'."?id=$id'>Delete</a>";
}


function output_selected($currentValue, $valueToMatch) {

    if ($currentValue == $valueToMatch) {

        return "selected ='selected'";

    }

}