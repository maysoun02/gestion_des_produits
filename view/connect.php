<?php 

$pdo = null;
  $dsn = 'mysql: host=localhost; dbname=prjet';
  $dbuser = 'root';
  $pw = '';
  
  try {
      $pdo = new PDO($dsn,$dbuser,$pw);
      $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);

  }
  catch(PDOException $e)
  {
   echo 'connection failed : '. $e->getMessage();
  }

  $pdo->query("SET NAMES UTF8");//solution encodage utf
  return $pdo;


  ?>