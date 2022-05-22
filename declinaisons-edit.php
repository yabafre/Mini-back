<?php require_once "fonctions/fonctions-declinaisons.php"; ?>
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
    if($declinaisonsSelect){ ?>
    <div class="contain-form">
    <form class="was-validated" action="declinaisons.php" method="POST"><p>Id :</p>
        <div>
             <input type="hidden" name='id' value="<?=$declinaisonsSelect['id']?>">
            <input type="text" name='idbis' value="<?=$declinaisonsSelect['id']?>" disabled="disabled">
        </div>
 <p>Produits key :</p>
        <div class="col-md-4 mb-3">
            
            <select name="id_produit" id="id_produit">
                <?php 
                $produits = produitsAll($mysqlClient);
                foreach($produits as $key => $produit){ ?>
                <option value="<?=$produit['id']?>"><?=$produit['title']?></option>
                <?php } ?>
            </select>
        </div>
<p>Title :</p>
        <div class="col-md-4 mb-3">
             <input type="text" name="title" id="title" placeholder="title" value="<?=$declinaisonsSelect['title']?>">
        </div>
<p>Price :</p>
        <div class="col-md-4 mb-3">
             <input type="number" name="price" id="price" placeholder="price" value="<?=$declinaisonsSelect['price']?>">
        </div>
<p>Stock :</p>
        <div class="col-md-4 mb-3">
             <input type="number" name="stock" id="stock" placeholder="stock" value="<?=$declinaisonsSelect['stock']?>">
        </div>
<p>Reference :</p>
        <div class="col-md-4 mb-3">
             <input type="text" name="reference" id="reference" placeholder="reference" value="<?=$declinaisonsSelect['reference']?>">
        </div>
    
        <div class="col-md-4 mb-3">
            <input class="btn btn-success" type="submit" value="envoyer">
            <a class="btn btn-warning" href="declinaisons.php">annuler</a>
        </div>

    </form>
                </div>
    <?php
    }else{
      echo '<p> Impossible d\'afficher le formulaire declinaisons introuvable</p>';
    }
  ?>



</body>

</html>