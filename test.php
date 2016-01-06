<?php 
 
// create an array from post data
// $data = array( 
// 	array(
// 		'name' => "Matthew Harding",
// 		'email' => "msharding23@gmail.com"
// 	),
// 	array(
// 		'name' => "Mark Harding",
// 		'email' => "markharding@gmail.com"
// 	),
// 	array(
// 		'name' => "Na'il Siddi",
// 		'email' => "nailsiddii@gmail.com"
// 	),
// 	array(
// 		'name' => "Anisa Harding",
// 		'email' => "aharding@gmail.com"
// 	)
// );
 
$data = array(
	array(
		'name' => "Matthew Harding",
		'email' => "msharding23@gmail"
	)
);

function saveToJsonFile($file_loc, $data) {

	// get the already existing orders
	$orders = getJsonFile("orders.json");

	// if the file isn't empty
	if ($orders !== false) {

		// add new order to pre orders list
		$data = array_merge($orders, $data);

		var_dump($data);

	} 

	// open orders.json
	$fp = fopen($file_loc, 'w') or die('Error opening orders.json file');

	// check to see if file is empty or if data already exist
	if (filesize('orders.json') == 0 && trim(file_get_contents('orders.json')) == false) {

		fwrite($fp, json_encode($data)); 

	} else {

		fwrite($fp, json_encode($data)); // if not first entry add a newline character

	}

	fclose($fp);

}

// saveToJsonFile("orders.json", $data);

function getJsonFile($file_loc) {

	$data = file_get_contents($file_loc);

	if ($data) {

		return $data;

	} else {

		return false;

	}

} 

$data = getJsonFile("orders.json");

echo $data;