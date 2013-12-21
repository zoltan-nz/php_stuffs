<?php

defined('MY_APP') or die('Restricted access');

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

function authenticate($username, $password) {
    
    $sqlQuery = "SELECT * from adminusers WHERE ";
    $sqlQuery .= "username = '" . mysql_real_escape_string($username) . "'";
    $sqlQuery .= " AND ";
    $sqlQuery .= "password = '" . mysql_real_escape_string($password) . "'";
    
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