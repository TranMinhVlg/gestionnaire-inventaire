<?php

try
{
	$database = new PDO('mysql:host=localhost;dbname=gestionnaire_inventaire;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

?>