<?php

defined('MY_APP') or die('Restricted access');


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

function product_link_to_edit($id) {

    return "<a href='product_edit.php?id=$id'>Edit</a>";

}

function product_link_to_delete($id) {

    return "<a href='product_delete.php?id=$id'>Delete</a>";

}

function mf_link_to_edit($id) {

    return "<a href='mf_edit.php?id=$id'>Edit</a>";

}

function mf_link_to_delete($id) {

    return "<a href='mf_delete.php?id=$id'>Delete</a>";

}

function output_selected($currentValue, $valueToMatch) {

    if ($currentValue == $valueToMatch) {

        return "selected ='selected'";

    }

}