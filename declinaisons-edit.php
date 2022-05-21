<?php require_once "fonctions/fonctions-declinaisons.php"; ?>
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
    if($declinaisonsSelect){ ?>
    <form action="declinaisons.php" method="POST">
        <div>
            Id : <input type="hidden" name='id' value="<?=$declinaisonsSelect['id']?>">
            <input type="text" name='idbis' value="<?=$declinaisonsSelect['id']?>" disabled="disabled">
        </div>

        <div>
            Produits key : 
            <select name="id_produit" id="id_produit">
                <?php 
                $produits = produitsAll($mysqlClient);
                foreach($produits as $key => $produit){ ?>
                <option value="<?=$produit['id']?>"><?=$produit['title']?></option>
                <?php } ?>
            </select>
        </div>

        <div>
            Title : <input type="text" name="title" id="title" placeholder="title" value="<?=$declinaisonsSelect['title']?>">
        </div>

        <div>
            Price : <input type="number" name="price" id="price" placeholder="price" value="<?=$declinaisonsSelect['price']?>">
        </div>

        <div>
            Stock : <input type="number" name="stock" id="stock" placeholder="stock" value="<?=$declinaisonsSelect['stock']?>">
        </div>

        <div>
            Reference : <input type="text" name="reference" id="reference" placeholder="reference" value="<?=$declinaisonsSelect['reference']?>">
        </div>
    
        <div>
            <input type="submit" value="envoyer">
        </div>

    </form>
    <?php
    }else{
      echo '<p> Impossible d\'afficher le formulaire declinaisons introuvable</p>';
    }
  ?>



</body>

</html>