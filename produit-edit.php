<?php require_once "fonctions/fonctions-produit.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edition</title>
</head>
<body>
  <h1>Edition</h1>
  <?php 
    if($produitsSelect){ ?>
      <form action="produit.php" method="POST">
        <div>
        <input type="hidden" name='id' value="<?=$produitsSelect['id']?>">
        <input type="text" name='idbis' value="<?=$produitsSelect['id']?>" disabled="disabled">
        </div>
        
        <div>
        <input type="text" name="title" id="title" placeholder="Name produit" value="<?=$produitsSelect['title']?>">
        </div>

        <div>
        <input type="text" name="reference" id="reference" placeholder="reference" value="<?=$produitsSelect['reference']?>">
        </div>
        <div>
        <input type="number" name="price" id="price" placeholder="price" value="<?=$produitsSelect['price']?>">
        </div>
        <div>
        <input type="number" name="stock" id="stock" placeholder="stock" value="<?=$produitsSelect['stock']?>">
        </div>

        <div>
        <input type="number" name="nb_declinaison" id="nb_declinaison" placeholder="declinaison" value="<?=$produitsSelect['nb_declinaison']?>">
        </div>
        
        <div>
        <input type="submit" value="envoyer"> 
        </div>
      
      </form>
<?php
    }else{
      echo '<p> Impossible d\'afficher le formulaire user introuvable</p>';
    }
  ?>

</body>
</html>