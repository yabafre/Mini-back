<?php
include_once "./environnement/bdd.php";

// AJOUTER UN PRODUITS
function ajoutproduits($mysqlClient, $produitsNew){
  $sqlQuery = 'INSERT INTO produits(reference, price, stock, title) VALUES (:reference, :price, :stock, :title)';
  $insertproduits = $mysqlClient->prepare($sqlQuery);
  $insertproduits->execute([
    'reference' => $produitsNew['reference'],
    'price' => $produitsNew['price'],
    'stock' => $produitsNew['stock'],
    'title' => $produitsNew['title'],

  ]);
}

//SELECTIONNER TOUS LES PRODUITS
function produitsAll($mysqlClient){
  $sqlQuery = 'SELECT * FROM produits ORDER BY id';
  $produitss = $mysqlClient->prepare($sqlQuery);
  $produitss->execute();
  return $produitss->fetchAll();
}

// SELECTIONNER UN PRODUITS
function produitsSelect($mysqlClient, $id){
  $sqlQuery = 'SELECT * FROM produits WHERE id = '.$id.'';
  $produits = $mysqlClient->prepare($sqlQuery);
  $produits->execute();
  return $produits->fetch(PDO::FETCH_ASSOC);
}

// COUNT NB_DECLINAISON
function countDecli($mysqlClient, $id_produit){
  $sqlQuery = 'SELECT COUNT(id_produit) 
  FROM declinaisons
  WHERE id_produit = '.$id_produit.'';
  $declinaisons = $mysqlClient->prepare($sqlQuery);
  $declinaisons->execute();
  return $declinaisons->fetch(PDO::FETCH_ASSOC);
}

//SUM STOCK DECLINAISONS
function sumStock($mysqlClient, $id_produit){
  $sqlQuery = 'SELECT SUM(stock) 
  FROM declinaisons
  WHERE id_produit = '.$id_produit.'';
  $declinaisons = $mysqlClient->prepare($sqlQuery);
  $declinaisons->execute();
  return $declinaisons->fetch(PDO::FETCH_ASSOC);
}

// Modifier le nombre de stock par rapport au nombre de déclinaisons de chaque produits
function updateStock($mysqlClient, $produits, $id){
  $sqlQuery = 'UPDATE produits SET stock = '.$produits.' WHERE id = '.$id.'';
  $declinaisonsUpdate = $mysqlClient->prepare($sqlQuery);
  $declinaisonsUpdate->execute();
}

// Modifier le nombre de déclinaisons de chaque produits
function updateDecli($mysqlClient, $declinaisons, $id){
  $sqlQuery = 'UPDATE produits SET nb_declinaison = '.$declinaisons.' WHERE id = '.$id.'';
  $declinaisonsUpdate = $mysqlClient->prepare($sqlQuery);
  $declinaisonsUpdate->execute();
}



//MODIFICATION USER
function produitsUpdate($mysqlClient, $produitsUpdate){
  $sqlQuery = 'UPDATE produits SET reference = :reference, price = :price, stock = :stock, title = :title WHERE id = :id';
  $updateUser = $mysqlClient->prepare($sqlQuery);
  $updateUser->execute([
    'id' =>  $produitsUpdate['id'],
    'reference' => $produitsUpdate['reference'],
    'price' => $produitsUpdate['price'],
    'stock' => $produitsUpdate['stock'],
    'title' => $produitsUpdate['title'],
  ]);
}

//SUPPRESSION produits
function produitsSuppr($mysqlClient, $id){
  $sqlQuery= 'DELETE FROM produits WHERE id = '.$id.'';
  $produits = $mysqlClient->prepare($sqlQuery);
  $produits->execute();
}

// Vérification des données transmises dans l'url
if( isset($_GET['id']) && is_numeric($_GET['id'])){
  $id = $_GET['id'];
  $produitsSelect = produitsSelect($mysqlClient, $id);
}

if(isset($_POST) && !empty($_POST) ){
  if(isset($_POST['id']) && !empty($_POST['id'])){
    if(isset($_POST['suppr']) && !empty($_POST['suppr'])){
      $id = $_POST['id'];
      produitsSuppr($mysqlClient, $id);
    }else{
      $produitsUpdate = $_POST;
      produitsUpdate($mysqlClient, $produitsUpdate);
    }
  }else{
    $produitsNew = $_POST;
    ajoutproduits($mysqlClient, $produitsNew);
  }
}