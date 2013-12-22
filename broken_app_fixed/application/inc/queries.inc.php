<?php

defined('MY_APP') or die('Restricted access');

/*
 *
 * PRODUCT CRUD interface
 *
 * */

// Return with all products in an associated array.
function productAll()
{

    $sqlQuery = "SELECT * FROM products WHERE 1 ORDER BY id ASC";
    $result = mysql_query($sqlQuery);

    $records = array();

    if ($result) {
        while ($records [] = mysql_fetch_assoc($result)) ;
        array_pop($records);
    }
    return $records;

}

// Return with inserted id or false and error message in _session['error']
function productSave($product)
{

    $sql = "INSERT INTO `products` ";
    $sql .= " (`id`, `" . implode("`, `", array_keys($product)) . "`, `updated_at`)";
    $sql .= " VALUES (NULL, '" . implode("', '", $product) . "', CURRENT_TIMESTAMP); ";

    var_dump($sql);

    $result = mysql_query($sql);
    return $result;

}

// Update products. Return true if success and return false if error.
function productUpdate($product)
{

    $id = (int)$product['id'];

    $sqlQuery = "UPDATE `products` SET ";
    $sqlQuery .= " `taste` = '" . mysql_real_escape_string($product['taste']) . "',";
    $sqlQuery .= " `price` = '" . mysql_real_escape_string($product['price']) . "',";
    $sqlQuery .= " `name` = '" . mysql_real_escape_string($product['name']) . "',";
    $sqlQuery .= " `description` = '" . mysql_real_escape_string($product['description']) . "', ";
    $sqlQuery .= " `mf_id` = '" . mysql_real_escape_string($product['mf_id']) . "', ";
    $sqlQuery .= " `country_id` = '" . mysql_real_escape_string($product['country_id']) . "', ";
    $sqlQuery .= " `imagefile_url` = '" . mysql_real_escape_string($product['imagefile_url']) . "'";
    $sqlQuery .= " WHERE `id` = $id ";


    $result = mysql_query($sqlQuery);

    return $result;

}

// Delete product option. Return true if success, false when not.
function productDelete($product_id)
{

    $sqlQuery = "DELETE FROM `products` WHERE `products`.`id` = $product_id";

    $result = mysql_query($sqlQuery);
    if ($result) {

        return true;

    } else {

        $_SESSION['error'] = mysql_error();
        return false;

    }
}

// Return with results in array or with false.
function productShow($product_id)
{

    $sqlQuery = "SELECT * from `products` WHERE `products`.`id` = $product_id";
    $result = mysql_query($sqlQuery);
    $record = array();

    if ($result) {
        $record = mysql_fetch_assoc($result);
    }
    return $record;
}

/*
 *
 * MANUFACTURER CRUD interface
 *
 * create/update/show/delete/all
 *
 * */

function mfUpdate($mf)
{
    $query = sprintf("UPDATE `mfs` SET `name` = '%s' WHERE `mfs`.`id` = '%s'", mysql_real_escape_string($mf['name']), mysql_real_escape_string($mf['id']));
    $result = mysql_query($query);
    return $result;
}

function mfShow($mf_id)
{
    $sql = "SELECT * FROM `mfs` WHERE `mfs`.`id` = $mf_id";
    $result = mysql_query($sql);
    $record = array();

    if ($result) {
        $record = mysql_fetch_assoc($result);
    }
    return $record;
}

function mfAll()
{
    $sql = "SELECT * FROM `mfs` WHERE 1\n"
        . "ORDER BY `mfs`.`id` ASC";
    $result = mysql_query($sql);

    $records = array();

    if ($result) {
        while ($records [] = mysql_fetch_assoc($result)) ;
        array_pop($records);
    }
    return $records;
}

function mfSave($mf)
{

    $sql = "INSERT INTO `mfs`";
    $sql .= " (`id`, `" . implode("`, `", array_keys($mf)) . "`, `updated_at`)";
    $sql .= " VALUES (NULL, '" . mysql_real_escape_string(implode("', '", $mf)) . "', CURRENT_TIMESTAMP); ";

    $result = mysql_query($sql);
    return $result;

}

function mfDelete($mf_id)
{
    $sql = "DELETE FROM `mfs` WHERE `mfs`.`id` = $mf_id";
    $result = mysql_query($sql);
    return $result;
}

/*
 *
 * COUNTRY
 *
 * all
 *
 * */

function countryAll()
{
    $sql = "SELECT * FROM `countries` WHERE 1 ORDER BY `countries`.`name` ASC;";
    $result = mysql_query($sql);

    $records = array();

    if ($result) {
        while ($records [] = mysql_fetch_assoc($result)) ;
        array_pop($records);
    }
    return $records;
}

function countryShow($country_id)
{
    $sql = "SELECT * FROM countries WHERE id = $country_id";
    $result = mysql_query($sql);
    $record = array();

    if ($result) {
        $record = mysql_fetch_assoc($result);
    }
    return $record;
}