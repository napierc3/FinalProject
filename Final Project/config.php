<?php

// Turns full error reporting on
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include functions for application
include('functions.php');

// Connecting to the MySQL database
$user = 'napierc3';
$password = 'hlaswo6Q';

$database = new PDO('mysql:host=localhost;dbname=db_fall17_napierc3', $user, $password);
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// Autoload classes
spl_autoload_register('my_other_autoloader');
spl_autoload_register('my_autoloader');

function my_autoloader($Customer) {
    include 'classes/Customer.' . $Customer . '.php';
}

function my_other_autoloader($ShoppingCart) {
    include 'classes/ShoppingCart.' . $ShoppingCart . '.php';
}

// Start the session
session_start();

$current_url = basename($_SERVER['REQUEST_URL']);

// If customerID is not set in the session and current URL is not login.php redirect to login page
if (!isset($_SESSION["customerID"]) && $current_url != 'login.php') {
    header("Location: login.php");
}

// Else if session key customerID is set get $customer from the database
elseif (isset($_SESSION["customerID"])) {
	$sql = file_get_contents('sql/getCustomer.sql');
	$params = array(
		'customerID' => $_SESSION["customerID"]
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$customers = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	$customer = $customers[0];
    
    $customer = new Customer($customerID);
}

// Set shopping cart if not already set
if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = new ShoppingCart;
}

?>