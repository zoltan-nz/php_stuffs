<?php

defined('MY_APP') or die('Restricted access');

/*
 *
 * PRODUCT CRUD interface
 *
 * */

function validateProduct($product) {

    return true;

}

function productAll() {

    $sqlQuery = "SELECT * FROM products";
    $result = mysql_query ( $sqlQuery );

    return mysql_fetch_assoc($result);

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

// Delete product option. Return true if success, false when not.
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

/*
 *
 * MANUFACTURER CRUD interface
 *
 * create/update/show/delete/validate/all
 *
 * */

function mfValidate($mf) {}
function mfCreate($mf) {}
function mfUpdate($mf) {
    $query = sprintf("UPDATE `mfs` SET `name` = '%s' WHERE `mfs`.`id` = '%s'", mysql_real_escape_string($mf['name']), mysql_real_escape_string($mf['id']));
    $result = mysql_query($query);
    return $result;
}

function mfShow($mf_id) {
    $sql = "SELECT * FROM `mfs` WHERE `mfs`.`id` = $mf_id";
    $result = mysql_query($sql);
    $record = array();

    if ($result) {
        $record =  mysql_fetch_assoc($result);
    }
    return $record;
}

function mfAll()
{
    $sql = "SELECT * FROM `mfs` WHERE 1\n"
        . "ORDER BY `mfs`.`id` ASC";
    $result     = mysql_query ( $sql );

    $records    = array ();

    if ($result) {
        while ( $records [] = mysql_fetch_assoc ( $result ) );
        array_pop ( $records );
    }
    return $records;
}

function mfSave($mf) {

    $sql = "INSERT INTO `mfs`";
    $sql .= " (`id`, `".implode("`, `", array_keys($mf))."`, `updated_at`)";
    $sql .= " VALUES (NULL, '".implode("', '", $mf)."', CURRENT_TIMESTAMP); ";

    $result = mysql_query($sql);
    return $result;

}

function mfDelete($mf_id)
{
    $sql = "DELETE FROM `mfs` WHERE `mfs`.`id` = $mf_id";
    $result = mysql_query($sql);
    return $result;
}