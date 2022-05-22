<?php include_once "fonctions/fonctions-produit.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link href="./layout/style.css" rel="stylesheet">
    <title>Produits</title>
</head>

<body class="form">
    <header class="header-form">
    <?php include_once "layout/menu.php"; ?>
    <?php include_once "layout/return.php"; ?>
</header>
<h2>formulaire produits</h2>
<div class="contain-form">
    <form class="was-validated" action="produit.php" method="POST">
        <div class="col-md-4 mb-3">
            <input class="form-control" id="validation" type="text" name="title" placeholder="Name produit" required>
        </div>
        <div class="col-md-4 mb-3">
            <input class="form-control" id="validation" type="text" name="reference" placeholder="référence" required>
        </div>
        <div  class="col-md-4 mb-3">
            <input class="form-control" id="validation" type="number" name="price" placeholder="Price" required>
        </div>
        <div class="col-md-4 mb-3">
            <input class="form-control" id="validation" type="number" name="stock" placeholder="stock" required>
        </div>
        
        <div >
            <input  class="btn btn-success" type="submit" value="envoyer">
        </div>

    </form>
</div>
    <p>Liste des produits</p>

    <?php 
    $produits = produitsAll($mysqlClient);    
    if(count($produits) > 0){ ?>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th colspan="col">id</th>
                <th colspan="col">Title</th>
                <th colspan="col">Reference</th>
                <th colspan="col">Price</th>
                <th colspan="col">Stock</th>
                <th colspan="col">NB_declinaison</th>
                <th colspan="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($produits as $key => $produit){ 
                $count = countDecli($mysqlClient, $produit["id"]);
                $sum = sumStock($mysqlClient, $produit["id"]);
                updateDecli($mysqlClient, $count["COUNT(id_produit)"], $produit["id"]);
                if($count["COUNT(id_produit)"] > 0){
                updateStock($mysqlClient, $sum["SUM(stock)"], $produit["id"]);}
                
                ?>
            <tr>
                <td><?=$produit['id']?></td>
                <td><?=$produit['title']?></td>
                <td><?=$produit['reference']?></td>
                <td><?=$produit['price']?>€</td>
                <td><?=$produit['stock']?> </td>
                <td><?=$produit['nb_declinaison']?></td>
                <td>
                    <p><a class="btn btn-info" href="produit-edit.php?id=<?=$produit['id']?>">Editer</a> <a class="btn btn-danger"
                            href="produit-suppression.php?id=<?=$produit['id']?>">Supprimer</a></p>
                </td>
            </tr>
            <?php
            }
          ?>
            <tr>
        </tbody>
    </table>
    <?php
    }else{
        echo  '<p>Pas d\'utilisateur inscrit </p>';
    }
  
  ?>

</body>

</html>