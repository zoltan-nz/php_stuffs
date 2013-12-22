<?php

defined('MY_APP') or die('Restricted access');

define('RESOURCES',         '/resources');

define('MANUFACTURERS',     RESOURCES.'/manufacturers');
define('PRODUCTS',          RESOURCES.'/products');
define('COUNTRIES',         RESOURCES.'/countries');


function form_select($select_name, $array_items, $selected_item_id = "") {
	

	$htmlString = "<select id='$select_name' name='$select_name' class='form-control'>";
	foreach($array_items as $option) {
		
		$option_label = $option["name"];
		$option_id = $option["id"];
		
		$selected = $option_id == $selected_item_id ? " selected " : "";
		
		$htmlString .= "<option value='$option_id' $selected>$option_label</option>";
	
	}
	
	$htmlString .= "</select>";
	
	return $htmlString;
}

/*
 *
 * PRODUCTS UI helpers
 *
 * */

function product_link_to_index()
{
    return "<a href='".PRODUCTS.'/index.php'."' class='btn btn-link'><< Back to Products</a>";
}

function product_link_to_create()
{
    return "<a href='".PRODUCTS.'/create.php'."' class='btn btn-success pull-right'>Add new Product</a>";
}

function product_link_to_edit($id)
{
    return "<a href='".PRODUCTS.'/edit.php'."?id=$id' class='btn btn-info'>Edit</a>";
}

function product_link_to_delete($id)
{
    return "<a href='".PRODUCTS.'/delete.php'."?id=$id' class='btn btn-danger js-delete'>Delete</a>";
}

/*
 *
 * MANUFACTURERS UI helpers
 *
 * */

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
