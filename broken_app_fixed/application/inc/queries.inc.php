<?php

defined('MY_APP') or die('Restricted access');

/*
 * Gets a complete list of movies Returns: Associative Array
 */
function product_listing_get() {
	
	$sqlQuery = "SELECT * FROM products";
	$result = mysql_query ( $sqlQuery );
	$records = array ();
	
	while ( $records [] = mysql_fetch_assoc ( $result ) )
		;
	
	array_pop ( $records ); // pop the null record which was pushed on as last item
	
	return $records;

}

/*
 * Gets a complete list of movies Returns: Associative Array
 */
function product_listing_get_byid($movie_id) {
	
	$movie_id = ( int ) $movie_id;
	$sqlQuery = "SELECT * FROM products where movie_id=$movie_id";
	$result = mysql_query ( $sqlQuery );
	$records = array ();
	
	while ( $records [] = mysql_fetch_assoc ( $result ) )
		;
	
	array_pop ( $records ); // pop the null record which was pushed on as last item
	
	return $records;

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