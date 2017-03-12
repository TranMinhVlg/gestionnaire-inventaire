<?php

include_once "connect_bdd.php";

$id = $_POST["id"];

// Delete table
$request = $database->prepare("DELETE FROM produit WHERE id = :id");
$request->bindValue(":id", $id);
$request->execute();

header("Location: ../../index.php");

?>

