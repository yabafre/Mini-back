<?php require_once "fonctions/fonctions-produit.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link href="./layout/style.css" rel="stylesheet">
  <title>Edition</title>
</head>
<body class="form">
  <h1>Edition</h1>
  <?php 
    if($produitsSelect){ ?>
    <div class="contain-form">
      <form action="produit.php" method="POST">
        <p>Id :</p>
        <div>
        <input type="hidden" name='id' value="<?=$produitsSelect['id']?>">
        <input type="text" name='idbis' value="<?=$produitsSelect['id']?>" disabled="disabled">
        </div>
        <p>Title :</p>
        <div class="col-md-4 mb-3">
        <input type="text" name="title" id="title" placeholder="Name produit" value="<?=$produitsSelect['title']?>">
        </div>
        <p>Reference :</p>
        <div class="col-md-4 mb-3">
        <input type="text" name="reference" id="reference" placeholder="reference" value="<?=$produitsSelect['reference']?>">
        </div>
        <p>Price :</p>
        <div class="col-md-4 mb-3">
        <input type="number" name="price" id="price" placeholder="price" value="<?=$produitsSelect['price']?>">
        </div>
        <p>Stock :</p>
        <div class="col-md-4 mb-3">
        <input type="number" name="stock" id="stock" placeholder="stock" value="<?=$produitsSelect['stock']?>">
        </div>
        <div>
        <input class="btn btn-success" type="submit" value="envoyer"> 
        <a class="btn btn-warning" href="produit.php">annuler</a>
        </div>
      
      </form>
    </div>
<?php
    }else{
      echo '<p> Impossible d\'afficher le formulaire user introuvable</p>';
    }
  ?>

</body>
</html>