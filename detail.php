<?php require_once "fonctions/fonctions-tarif.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche produit</title>
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
    <h2>Détail Produit</h2>
    <?php include_once "layout/menu.php"; ?>
    <?php 
    if(count($produitTarif) > 0){ ?>
    <table>
        <tr>
            <th>Id</th>
            <th>Prix</th>
            <th>Caracteristique</th>
            <th>action</th>
        </tr>
        <?php

            foreach($produitTarif as $tarif){ ?>
        <tr>
            <td><?= $tarif["id"] ?></td>
            <td><?= $tarif["prix"] ?> €</td>
            <td><?= $tarif["caracteristique"] ?></td>
            <td>

                <p><a href="tarif-edit.php?id=<?=$tarif['id']?>">Editer</a> <a
                        href="tarif-suppression.php?id=<?=$tarif['id']?>">Supprimer</a></p>
            </td>
        </tr>
        <?php 
                }
        ?>
    </table>
    <?php
    }else{
      echo '<p> Impossible d\'afficher le formulaire user introuvable</p>';
    }
  ?>

</body>

</html>