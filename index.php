<?php

include_once "src/php/connect_bdd.php"; //connect to database

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Title</title>
    <link rel="stylesheet" href="src/css/style.css">
  </head>
  <body>
    <input type="submit" value="+  CREATE" class="create">



    <form action="src/php/add.php" method="post" class=" form1 invisible">

      <div>
        <input type="file" class="inputfile"/>
      </div>

      <input type="text" name="name-manga" placeholder="" id="name-manga">
      <label for="first-name">Name manga</label>
      <br>
      <input type="text" name="author" placeholder="" id="author">
      <label for="last-name">Author</label>
      <br>

      <input type="int" name="price" placeholder="" id="price">
      <label for="price">$</label>
      <br>
      <input type="text" name="description" placeholder="" id="description">
      <label for="description">Description</label>
      <br>
      <input type="text" name="date" placeholder="" id="date">
      <label for="date">Date</label>
      <br>

      <input type="submit" value="SUBMIT" class="submit">
      <input type="button" value="CANCEL" class="submit1">

    </form>



    <?php
    $requete = $database -> prepare("SELECT * FROM produit");
    $requete -> execute();
    $tab = $requete -> fetchAll();
    foreach($tab as $index){
    ?>


    <form action="src/php/delete.php" method="post">
      <input type="hidden" name="id" value="<?php echo $index[0]?>">
      <input type="text" name="name-manga" placeholder="" id="name-manga" value="<?php echo $index[1]?> ">
      <label for="first-name">Name manga</label>
      <br>
      <input type="text" name="author" placeholder="" id="author" value="<?php echo $index[2];?>">
      <label for="last-name">Author</label>
      <br>

      <input type="int" name="price" placeholder="" id="price" value="<?php echo $index[3];?>">
      <label for="price">$</label>
      <br>
      <input type="text" name="description" placeholder="" id="description" value="<?php echo $index[4];?>">
      <label for="description">Description</label>
      <br>
      <input type="text" name="date" placeholder="" id="date" value="<?php echo $index[5];?>">
      <label for="date">Date</label>
      <br>

      <input type="submit" value="DELETE" class="delete">

    </form>
    <?
    }
    ?>



    <script src="src/js/script.js"></script>
  </body>
</html>