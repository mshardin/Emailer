<?php 

// Collect all details from Angular HTTP Request
// Manually create GLOBAL $_POST variable from raw input
if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST))
	$_POST = json_decode(file_get_contents('php://input'));

@$name = $_POST->name;
@$email = $_POST->email;

// create an array from post data
$data = array(
	array(
		'name' => $name,
		'email' => $email
	)
);

// encode post data to form a json string 
echo json_encode($data);

// update orders json file
saveToJsonFile('orders.json', $data);

function saveToJsonFile($file_loc, $data) {

	// get the already existing orders
	$orders = getJsonFile('orders.json');

	// if the file isn't empty
	if ($orders !== false) {

		// add new order to pre orders list
		$data = array_merge($orders, $data);

	} 

	// open orders.json
	$fp = fopen($file_loc, 'w') or die('Error opening orders.json file');

	// check to see if file is empty or if data already exist
	if (filesize('orders.json') == 0 && trim(file_get_contents('orders.json')) == false) {

		fwrite($fp, json_encode($data)); 

	} else {

		fwrite($fp, ",\n" . json_encode($data)); // if not first entry add a newline character

	}

	fclose($fp);

}

function getJsonFile($file_loc) {

	$data = file_get_contents($file_loc);

	$data = json_decode($data, true);

	if ($data) {

		return $data;

	} else {

		return false;

	}

}  