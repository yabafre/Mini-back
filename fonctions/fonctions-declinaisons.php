<?php
include_once "./environnement/bdd.php";

// AJOUTER UN declinaisons
function ajoutdeclinaisons($mysqlClient, $declinaisonsNew){
  $sqlQuery = 'INSERT INTO declinaisons(id_produit, price, stock, title, reference) VALUES (:id_produit, :price, :stock, :title, :reference)';
  $insertdeclinaisons = $mysqlClient->prepare($sqlQuery);
  $insertdeclinaisons->execute([
    'id_produit' => $declinaisonsNew['id_produit'],
    'price' => $declinaisonsNew['price'],
    'stock' => $declinaisonsNew['stock'],
    'title' => $declinaisonsNew['title'],
    'reference' => $declinaisonsNew['reference']
  ]);
}

//SELECTIONNER TOUS LES declinaisons
function declinaisonsAll($mysqlClient){
  $sqlQuery = 'SELECT * FROM declinaisons ORDER BY id';
  $declinaisons = $mysqlClient->prepare($sqlQuery);
  $declinaisons->execute();
  return $declinaisons->fetchAll();
}


// SELECTIONNER UNE declinaisons
function declinaisonsSelect($mysqlClient, $id){
  $sqlQuery = 'SELECT * FROM declinaisons WHERE id = '.$id.'';
  $declinaisons = $mysqlClient->prepare($sqlQuery);
  $declinaisons->execute();
  return $declinaisons->fetch(PDO::FETCH_ASSOC);
}

// SELECTIONNER UN produits
function produitsSelect($mysqlClient, $id){
  $sqlQuery = 'SELECT * FROM produits WHERE id = '.$id.'';
  $produits = $mysqlClient->prepare($sqlQuery);
  $produits->execute();
  return $produits->fetch(PDO::FETCH_ASSOC);
}

// Vérification des données transmises dans l'url
if( isset($_GET['id']) && is_numeric($_GET['id'])){
  $id = $_GET['id'];
  $produitsSelect = produitsSelect($mysqlClient, $id);

  if($produitsSelect){
    $produitsdeclinaisons = produitsdeclinaisons($mysqlClient, $produitsSelect["id"]);
  }

}

// // SELECTIONNER produits - declinaisons
function produitsdeclinaisons($mysqlClient, $id){
  $sqlQuery = 'SELECT * FROM produits LEFT JOIN declinaisons ON produits.id = declinaisons.id_produit WHERE produits.id = '.$id.'';
  $produitsdeclinaisons = $mysqlClient->prepare($sqlQuery);
  $produitsdeclinaisons->execute();
  return $produitsdeclinaisons->fetchAll();
}

//SELECTIONNER TOUS LES produitsS
function produitsAll($mysqlClient){
  $sqlQuery = 'SELECT * FROM produits ORDER BY id';
  $produitss = $mysqlClient->prepare($sqlQuery);
  $produitss->execute();
  return $produitss->fetchAll();
}

//MODIFICATION declinaisons
function declinaisonsUpdate($mysqlClient, $declinaisonsUpdate){
  $sqlQuery = 'UPDATE declinaisons SET id_produit = :id_produit, price = :price, stock = :stock, title = :title, reference = :reference WHERE id = :id';
  $updatedeclinaisons = $mysqlClient->prepare($sqlQuery);
  $updatedeclinaisons->execute([
    'id' =>  $declinaisonsUpdate['id'],
    'id_produit' =>  $declinaisonsUpdate['id_produit'],
    'price' => $declinaisonsUpdate['price'],
    'stock' => $declinaisonsUpdate['stock'],
    'title' => $declinaisonsUpdate['title'],
    'reference' => $declinaisonsUpdate['reference']
  ]);
}

//SUPPRESSION declinaisons
function declinaisonsSuppr($mysqlClient, $id){
  $sqlQuery= 'DELETE FROM declinaisons WHERE id = '.$id.'';
  $declinaisons = $mysqlClient->prepare($sqlQuery);
  $declinaisons->execute();
}

// Vérification des données transmises dans l'url
if( isset($_GET['id']) && is_numeric($_GET['id'])){
  $id = $_GET['id'];
  $declinaisonsSelect = declinaisonsSelect($mysqlClient, $id);
}

if(isset($_POST) && !empty($_POST) ){
  if(isset($_POST['id']) && !empty($_POST['id'])){
    if(isset($_POST['suppr']) && !empty($_POST['suppr'])){
      $id = $_POST['id'];
      declinaisonsSuppr($mysqlClient, $id);
    }else{
      $declinaisonsUpdate = $_POST;
      declinaisonsUpdate($mysqlClient, $declinaisonsUpdate);
    }
  }else{
    $declinaisonsNew = $_POST;
    ajoutdeclinaisons($mysqlClient, $declinaisonsNew);
  }
}