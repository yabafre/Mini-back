<?php require_once "fonctions/fonctions-declinaisons.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression</title>
</head>

<body>
    <h1>Supprimer une declinaisons</h1>

    <?php 
    if($declinaisonsSelect){ ?>
    <form action="declinaisons.php" method="POST">
        <input type="hidden" name='id' value="<?=$declinaisonsSelect['id']?>">
        <input type="hidden" name='suppr' value="1">
        <input type="submit" value="La suppression est définitive">
    </form>
    <?php
    }else{
      echo '<p> Impossible d\'afficher le formulaire declinaisons introuvable</p>';
    }
  ?>
</body>

</html>