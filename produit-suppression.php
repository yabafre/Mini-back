<?php require_once "fonctions/fonctions-produit.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link href="./layout/style.css" rel="stylesheet">
    <title>Suppression</title>
</head>

<body class="form">
<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1>Suppression</h1>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php   
    if($produitsSelect){ 
      if($produitsSelect['nb_declinaison'] == 0){?>
      <div class="contain-form">
        <form action="produit.php" method="POST">
            <input type="hidden" name='id' value="<?=$produitsSelect['id']?>">
            <input type="hidden" name='suppr' value="1">
            <input class="btn btn-danger" type="submit" value="La suppression est définitive">
            <br>
            <a class="btn btn-warning" href="produit.php">annuler</a>
        </form>
      </div>
        <?php
      }else{
        echo '<p> Veuillez supprimer les déclinaisons d\'abord</p>';
        echo '<a class="btn btn-warning" href="produit.php">retour</a>';
      }
    } else {
      echo '<p> <p> Impossible d\'afficher le formulaire produit introuvable</p>';
    }
  ?>
</body>

</html>