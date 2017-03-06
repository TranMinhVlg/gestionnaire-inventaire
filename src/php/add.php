<?php

include_once "connect_bdd.php";
$name = $_POST["name-manga"];
$author = $_POST["author"];
$price = $_POST["price"];
$description = $_POST["description"];
$date = $_POST["date"];

$request = $database -> prepare ("INSERT INTO produit(name, price, author, description, date) VALUES (:name, :price, :author, :description, :date)");

$request -> bindValue(":name", $name);
$request -> bindValue(":author", $author);
$request -> bindValue(":price", $price);
$request -> bindValue(":description", $description);
$request -> bindValue(":date", $date);

$request -> execute();

header("Location: ../../index.php"); //come back to index.php
?>

