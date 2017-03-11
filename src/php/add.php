<?php

include_once "connect_bdd.php";

// Messages
$error_messages = array();
$success_messages = array();

// Form sent
if(!empty($_POST))
{

  // Retrieve data
  $name_manga = trim($_POST['name-manga']);
  $author = $_POST["author"];
  $price        = (int)$_POST['price'];
  $description = $_POST["description"];
  $date = $_POST["date"];

  // Name manga errors
  if(empty($name_manga))
    $error_messages['name_manga'] = 'should not be empty';

  // Price errors
  if(empty($price))
    $error_messages['price'] = 'should not be empty';
  else if($price < 0 || $price > 150 || is_nan($price))
    $error_messages['price'] = 'wrong value';


  // No errors
  if(empty($error_messages))
  {

$request = $database -> prepare ("INSERT INTO produit(name, price, author, description, date) VALUES (:name, :price, :author, :description, :date)");

$request -> bindValue(":name", $name_manga);
$request -> bindValue(":author", $author);
$request -> bindValue(":price", $price);
$request -> bindValue(":description", $description);
$request -> bindValue(":date", $date);

$request -> execute();
  }
}
?>

