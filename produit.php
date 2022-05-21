<?php include_once "fonctions/fonctions-produit.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit</title>
    <style>
    table,
    td {
        border: 1px solid #333;
        text-align: center;
    }

    table {
        width: 100%;
        font-family: arial, sans-serif;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 8px;
    }

    thead,
    tfoot {
        background-color: #333;
        color: #fff;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    td p {
        line-height: 1.5;
    }
    </style>
</head>

<body>
    <h1>Produit</h1>

    <?php include_once "layout/menu.php"; ?>

    <h2>formulaire produit</h2>

    <form action="produit.php" method="POST">
        <div>
            <input type="text" name="title" placeholder="Name produit">
        </div>
        <div>
            <input type="text" name="reference" placeholder="référence">
        </div>
        <div>
            <input type="number" name="price" placeholder="Price">
        </div>
        <div>
            <input type="number" name="stock" placeholder="stock">
        </div>
        
        <div>
            <input type="submit" value="envoyer">
        </div>

    </form>

    <p>Liste des produits</p>

    <?php 
    $produits = produitsAll($mysqlClient);    
    $count = countDecli($mysqlClient);
    if(count($produits) > 0){ ?>
    <table>
        <thead>
            <tr>
                <th colspan="1">id</th>
                <th colspan="1">Title</th>
                <th colspan="1">Reference</th>
                <th colspan="1">Price</th>
                <th colspan="1">Stock</th>
                <th colspan="1">NB_declinaison</th>
                <th colspan="1">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($produits as $key => $produit){ ?>
            <tr>
                <td><?=$produit['id']?></td>
                <td><?=$produit['title']?></td>
                <td><?=$produit['reference']?></td>
                <td><?=$produit['price']?>€</td>
                <td><?=$produit['stock']?> </td>
                <td><?=$produit['nb_declinaisons']?> $count </td>
                <td>
                    <p><a href="produit-edit.php?id=<?=$produit['id']?>">Editer</a> <a
                            href="produit-suppression.php?id=<?=$produit['id']?>">Supprimer</a> <a
                            href="detail.php?id=<?=$produit['id']?>">detail</a></p>
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