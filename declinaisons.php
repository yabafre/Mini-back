<?php include_once "fonctions/fonctions-declinaisons.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarif</title>
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
    <h1>Declinaisons</h1>

    <?php include_once "layout/menu.php"; ?>

    <h2>Declinaisons</h2>
    <form action="declinaisons.php" method="POST">
        <div>
            <select name="id_produit" id="id_produit">
                <?php 
                $produits = produitsAll($mysqlClient);
                foreach($produits as $key => $produit){ ?>
                <option value="<?=$produit['id']?>"><?=$produit['title']?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <input type="text" name="title" placeholder="title">
        </div>
        <div>
            <input type="number" name="price" placeholder="price">
        </div>
        <div>
            <input type="number" name="stock" placeholder="stock">
        </div>
        <div>
            <input type="text" name="reference" placeholder="reference">
        </div>
        <div>
            <input type="submit" value="envoyer">
        </div>

    </form>
    <p>Liste des declinaisons</p>

    <?php 
    $declinaisons = declinaisonsAll($mysqlClient);    
    if(count($declinaisons) > 0){ ?>
    <table>
        <thead>
            <tr>
                <th colspan="1">Title</th>
                <th colspan="1">Id_produit</th>
                <th colspan="1">Price</th>
                <th colspan="1">Stock</th>
                <th colspan="1">Reference</th>
                <th colspan="1">Actions</th>
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
                    <p><a href="declinaisons-edit.php?id=<?=$declinaison['id']?>">Editer</a> <a
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