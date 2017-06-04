<?php 

$req = $database->prepare("UPDATE request SET task = :task");
        $req->bindValue(':task', $task);
        $req->execute();

?>