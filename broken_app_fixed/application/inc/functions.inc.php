<?php

defined('MY_APP') or die('Restricted access');

function validateproduct($product) {

	return true;

}

// Return with inserted id or false and error message in _session['error']
function saveProduct($product) {
	
	$sqlQuery = "
        INSERT INTO products
        (title, mf_id,	price,	taste)
      	values
      	('{$product['title']}',
      	 '{$product['mf_id']}',
      	 '{$product['price']}',
      	 '{$product['taste']}')";
	
	$result = mysql_query($sqlQuery);

	if (!$result) {
        $_SESSION['error'] = $sqlQuery.("<br/>").mysql_error();
        return false;
	}
	
	return mysql_insert_id();
}

function uploadFiles($product_id) {
	echo UPLOAD_PATH;
	echo $_FILES['uploadedfile']['tmp_name'];
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], UPLOAD_PATH)) {
		saveImageRecord($product_id, basename( $_FILES['uploadedfile']['name']));
	} else{
		$_SESSION['error'] = "There was an error uploading the file, please try again!";
	}
}


function saveImageRecord($product_id, $imageName) {

	$sqlQuery = "UPDATE products SET 'imagefile' = '$imageName' where 'product_id' = '$product_id'";
	$result = mysql_query($sqlQuery);

}

// Update products. Return true if success and return false if error.
function updateProduct($product) {

    $productID = (int) $product['movie_id'];

    $sqlQuery = "UPDATE products SET ";
    $sqlQuery .= " 'taste' = '"         . $product['taste'] . "',";
    $sqlQuery .= " 'price' = '"         . $product['price'] . "',";
    $sqlQuery .= " 'title' = '"         . $product['title'] . "',";
    $sqlQuery .= " 'description' = '"   . $product['description'] . "', ";
    $sqlQuery .= " 'mf_id' = '"         . $product['mf_id'] . "'";
    $sqlQuery .= " WHERE 'product_id' = '". $productID . "'";
    
    var_dumb($sqlQuery);
    
    $result = mysql_query($sqlQuery);

	if ($result) {

        return true;

    } else {

		$_SESSION['error'] = mysql_error();
        return false;
    }
}

// Delte product option. Return true if success, false when not.
function deleteProduct($id) {

    $productID = (int) $id;

    $sqlQuery = "DELETE FROM products where 'product_id' = '$productID'";
    
    $result = mysql_query($sqlQuery);
    if ($result) {

        return true;

    } else {

        $_SESSION['error'] = mysql_error();
        return false;

    }
}

// Return with results in array or with false.
function showProduct($id) {

    $productID = (int) $id;

    $sqlQuery = "SELECT * from products WHERE 'product_id' = '$productID'";

	$result = mysql_query($sqlQuery);

    if ($result) {
        return mysql_fetch_assoc($result);
    } else {
        $_SESSION['error'] = mysql_error();
        return false;
    }
}


function authenticate($username, $password) {
    
    $sqlQuery = "SELECT * from adminusers WHERE ";
    $sqlQuery .= "username = '" . $username . "'";
    $sqlQuery .= " AND ";
    $sqlQuery .= "password = '" .$password . "'";
    
    $result = mysql_query($sqlQuery);

    if ($result) {

        if (mysql_num_rows($result)==1) {
            return true;
        }

    } else {
        $_SESSION['error'] = mysql_error();
        return false;
    }

}