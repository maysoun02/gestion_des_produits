<?php
include "../controllers/produitC.php";


$id = $_GET["id"];

$produitC = new produitC();
$produitC->supprimerProducts($id);



echo "<script>window.open('afficherproduct.php?id=deletedSucceed','_self')</script>";
