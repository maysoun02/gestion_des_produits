<?php
require_once '../controllers/produitC.php';
require_once '../models/produit.php';

    // Retrieve form data
    $id = $_POST['id'];
    $namep = $_POST['namep'];
    $price = intval($_POST['price']);
    $category_id = intval($_POST['category_id']);

    // Create a new produit object with the form data
    $newProduit = new produit($id,$namep, $price, $category_id);

    // Initialize the produit controller
    $produitController = new produitC;

    // Add the produit to the database
    $produitController->AjouterProduit($newProduit);

    // Redirect to a different page or display a success message here
   // header("Location: success_page.php");
    exit();

?>
