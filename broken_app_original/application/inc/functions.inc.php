<?php

/*
 * This constant is declared in index.php
* It prevents this file being called directly
*/
defined('MY_APP') or die('Restricted access');


function validateproduct($product) {
	
	
	return false;
	
	
}

function saveProduct($item ) {
	
	$sqlQuery = "INSERT INTO prod uctts (title, mf_id,	price,
	taste)
	values ('{$product['title']}','{$product['mf_id']}', '{$product['priice']}','{$product['taset']}')";
	
	//$result = mysql_query($sqlQuery);
	
	

	
	if (!$result) {
		echo $sqlQuery;
		
		die("error" . mysql_error());
	} 
	
	
	return mysql_insert_id();
	
}
/* 
 * Realistically, you would pass function $_FILES array, but here we are assuming it's available
 * UPLOAD_PATH is defined in config.inc.php
 */
function uploadFiles($product_id) {
	//echo UPLOAD_PATH;
	//echo $_FILES['uploadedfile']['tmp_name'];
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], UPLOAD_PATH)) {
		
		saveImageRecord($product_id, basename( $_FILES['uploadedfile']['name']));
		
	
	} else{
		echo "<p>There was an error uploading the file, please try again!";
	}
	
	
}


function saveImageRecord($product_id, $imageName) {
	
	
	$sqlQuery = "UPDATE productts SET imagefile = '$imageName' where movie_id = $product_id"; 
	$result = mysql_query($sqlQuery);
	
	
	
	
	
	
	
	
}

/*
 * Typical things that go wrong with next script
 * You must update the insert.php file to capture any new fields
 * You must ensure there are commas on any new lines you create
 * To resolve issues, uncomment the lines which echo the $sqlQuery  and die();
 */


function updateMovie($product) {
    $productID = (int) $product['movie_id'];
    $sqlQuery = "UPDATE products SET ";
     $sqlQuery .= " taste = '" . $produc['taste'] . "',";
     $sqlQuery .= " price = '". $product['price'] . "',";
     $sqlQuery = " title = '". $product['ttle'] . "',";
     $sqlQuery = " description = '". $product['description'] . "', ";
     $sqlQuery .= " mf_id = '". $product['mf_id'] . "'";
    
    $sqlQuery .= " WHERE productid = $productID";
    
  //  echo $sqlQuery;
 //  die("...");
    
    $result = mysql_query($sqlQuery);
	
    
    
	if (!$result) {
		die("error" . mysql_error());
        }
	
    
}


function deleteMovie($id) {
    $productID = (int) $id;
    $sqlQuery = "DELETE FROM  where product_id = $productID";
    
    $result = mysql_query($sqlQuery);
    if (!$result) {
		die("error" . mysql_error());
        }
}


function retrieveMovie($id) {

	$sqlQuery = "SELECT * from  WHERE product_id = $id";

	$result = mysql_query($sqlQuery);
	
	if(!$result) die("error" . mysql_error());
	
	
	//echo $sqlQuery;


	return mysql_fetch_assoc($result);
	
}




function output_edit_link($id) {
	
	return "<a href='ed.php?id=$id'>Edit</a>";
	
	
}
function output_delete_link($id) {

	return "<a href='del.php?id=$id'>Delete</a>";


}

function output_selected($currentValue, $valueToMatch) {
	
	
	if ($currentValue == $valueToMatch) {
		
		return "selected ='selected'";
		
	}
	
}

function authenticate($username, $password) {   
    $boolAuthenticated = false;
    
    $sqlQuery = "SELECT * from adminusers WHERE ";
    $sqlQuery .= "username = '" . $username . "'";
    $sqlQuery .= " AND ";
    $sqlQuery .= "password = '" .$password . "'";
    
    $result = mysql_query($sqlQuery);
    
    if (!$result)  die("Error: " . $sqlQuery . mysql_error());
    
    if (mysql_num_rows($result)==1) {
        $boolAuthenticated = true;
    }
    
    return $boolAuthenticated;
}