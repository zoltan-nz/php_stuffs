<?php

defined('MY_APP') or die('Restricted access');

function validateproduct($product) {

    return true;

}

// Return with inserted id or false and error message in _session['error']
function createProduct($product) {

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


function productAll() {
	
	$sqlQuery = "SELECT * FROM products";
	$result = mysql_query ( $sqlQuery );

    return mysql_fetch_assoc($result);

}

function productAllbyId($product_id) {
	
	$product_id = ( int ) $product_id;
	$query = "SELECT * FROM products where 'movie_id' = '$product_id'";
	$result = mysql_query ( $sqlQuery );

	return mysql_fetch_assoc ( $result );

}

function mf_get_all() {
	
	$sqlQuery = "SELECT * FROM mfs where 1 order by mf_id asc";
	$result = mysql_query ( $sqlQuery );
	$records = array ();
	
	if ($result) {
		while ( $records [] = mysql_fetch_assoc ( $result ) );
		
		
		
		array_pop ( $records ); // pop the null record which was pushed on as last
		                     // item
	}
	return $records;

}