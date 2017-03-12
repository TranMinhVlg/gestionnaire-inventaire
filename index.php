<?php

include_once "src/php/connect_bdd.php"; //connect to database
include_once "src/php/add.php"; //connect to database

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <title>Title</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
    <link rel="stylesheet" href="src/css/style.css">
  </head>
  <body>

    <div class="container">  
      <div class="center">
        <input type="submit" value="+  CREATE" class="create">
      </div>
      
      <div class="messages success">
        <?php foreach($success_messages as $_message): ?>
        <p><?= $_message ?></p>
        <?php endforeach ?>
      </div>

      <div class="messages errors">
        <?php foreach($error_messages as $_key => $_message): ?>
        <p><?= "$_key : $_message" ?></p>
        <?php endforeach ?>
      </div>



      <form action="#" method="post" class=" form1 invisible">
        <div class="bg">
          <div class="<?= array_key_exists('name_manga', $error_messages) ? 'error' : '' ?>">
            <input type="text" name="name-manga" placeholder="" id="name-manga" class="input-border-style">
            <br>
            <label for="name-manga">Name manga</label>

          </div>

          <div class="<?= array_key_exists('author', $error_messages) ? 'error' : '' ?>">
            <input type="text" name="author" placeholder="" id="author" class="input-border-style">
            <br>
            <label for="author">Author</label>

          </div>

          <div class="<?= array_key_exists('price', $error_messages) ? 'error' : '' ?>">
            <input type="int" name="price" placeholder="" id="price" class="input-border-style">
            <br>
            <label for="price">Price $</label>

          </div>

          <div class="<?= array_key_exists('description', $error_messages) ? 'error' : '' ?>">
            <input type="text" name="description" placeholder="" id="description" class="input-border-style">
            <br>
            <label for="description">Description</label>
          </div>


          <div class="<?= array_key_exists('date', $error_messages) ? 'error' : '' ?>">
            <input type="text" name="date" placeholder="" id="date" class="input-border-style">
            <br>
            <label for="date">Date (yyyy-mm-dd)</label>
          </div>


          <div class="center">
            <input type="submit" value="SUBMIT" class="submit">
            <input type="button" value="CANCEL" class="submit1">
          </div>
        </div>
      </form>



      <?php
  $requete = $database -> prepare("SELECT * FROM produit");
          $requete -> execute();
          $tab = $requete -> fetchAll();
          foreach($tab as $index){
      ?>


      <form action="src/php/delete.php" method="post">
       <div class="form-background">
        <div class="bg">
          <input type="hidden" name="id" value="<?php echo $index[0]?>">
          <input disabled type="text" name="name-manga" placeholder="" id="name-manga" class="input-border-style" value="<?php echo $index[1]?> ">
          <br>
          <label for="name-manga">Name manga</label>


          <input disabled type="text" name="author" placeholder="" id="author" class="input-border-style" value="<?php echo $index[2];?>">
          <br>
          <label for="author">Author</label>

          <input disabled type="int" name="price" placeholder="" id="price" class="input-border-style" value="<?php echo $index[3];?>">
          <br>
          <label for="price">Price $</label>

          <input disabled type="text" name="description" placeholder="" id="description" class="input-border-style" value="<?php echo $index[4];?>">
          <br>
          <label for="description">Description</label>

          <input disabled type="text" name="date" placeholder="" id="date" class="input-border-style" value="<?php echo $index[5];?>">
          <br>
          <label for="date">Date</label>


          <input type="submit" value="DELETE" class="delete">
        </div>
        </div>
      </form>

     
     
     
     
     
      <?php
          }
      ?>

      <script src="src/js/script.js"></script>
      </body>
    </html>