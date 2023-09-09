<?php
include "../controllers/categoryC.php";


$id = $_GET["id"];

$categoryC = new categoryC();
$categoryC->supprimerCategory($id);



echo "<script>window.open('affichercategory.php?id=deletedSucceed','_self')</script>";
