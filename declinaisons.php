<?php include_once "fonctions/fonctions-declinaisons.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link href="./layout/style.css" rel="stylesheet">
    <title>Declinaisons</title>

</head>

<body class="form">
    <header class="header-form">
    <?php include_once "layout/menu.php"; ?>
    <?php include_once "layout/return.php"; ?>
</header>
    <h2>Declinaisons</h2>
    <div class="contain-form">
    <form class="was-validated" action="declinaisons.php" method="POST" validated>
        <div class="form-group">
            <select class="custom-select" name="id_produit" id="id_produit" required>
                <?php 
                $produits = produitsAll($mysqlClient);
                foreach($produits as $key => $produit){ ?>
                <option value="<?=$produit['id']?>"><?=$produit['title']?></option>
                <?php } ?>
            </select>
        </div>
        <br>
        <div class="col-md-4 mb-3">
            <input class="form-control" id="validation" type="text" name="title" placeholder="title" required>
        </div>
        <div class="col-md-4 mb-3">
            <input class="form-control" id="validation" type="number" name="price" placeholder="price" required>
        </div>
        <div class="col-md-4 mb-3">
            <input class="form-control" id="validation" type="number" name="stock" placeholder="stock" required>
        </div>
        <div class="col-md-4 mb-3">
            <input class="form-control" id="validation" type="text" name="reference" placeholder="reference" required>
        </div>
        <div>
            <input class="btn btn-success" type="submit" value="envoyer">
        </div>

    </form>
                </div>
    <p>Liste des declinaisons</p>

    <?php 
    $declinaisons = declinaisonsAll($mysqlClient);    
    if(count($declinaisons) > 0){ ?>
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th colspan="col">Title</th>
                <th colspan="col">Id_produit</th>
                <th colspan="col">Price</th>
                <th colspan="col">Stock</th>
                <th colspan="col">Reference</th>
                <th colspan="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($declinaisons as $key => $declinaison){ ?>
            <tr>
                <td><?=$declinaison['title']?></td>
                <td><?=$declinaison['id_produit']?></td>
                <td><?=$declinaison['price']?></td>
                <td><?=$declinaison['stock']?></td>
                <td><?=$declinaison['reference']?></td>
                <td>
                    <p><a class="btn btn-info" href="declinaisons-edit.php?id=<?=$declinaison['id']?>">Editer</a> <a class="btn btn-danger"
                            href="declinaisons-suppression.php?id=<?=$declinaison['id']?>">Supprimer</a></p>
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