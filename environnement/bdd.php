<?php

try{
  $mysqlClient = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE =>
  PDO::ERRMODE_EXCEPTION]);
  
  }catch(Exception $e){if($_POST){
  ajoutUser($mysqlClient);
  }
  die('Erreur : '.$e->getMessage());
  }