<?php 

include_once "connect_bdd.php";

// Messages
$error_messages = array();
$success_messages = array();

// Form sent
if(!empty($_POST))
{

  // Retrieve data
  $name_manga = trim($_POST['name_manga']);
  $price        = (int)$_POST['price'];

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
    $prepare = $pdo->prepare('INSERT INTO users(first_name, age, gender) VALUE (:first_name, :age, :gender)');

    // Set values
    $prepare->bindValue('first_name', $first_name);
    $prepare->bindValue('age', $age);
    $prepare->bindValue('gender', $gender);

    // Execute INSERT
    $prepare->execute();

    // Add success message
    $success_messages[] = 'User registered';

    // Reset values
    $_POST['first-name'] = '';
    $_POST['age']        = '';
  }
}

// No data sent
else
{
  // Default values
  $_POST['first-name'] = '';
  $_POST['age']        = '';
}