<?php
require_once '../controllers/panierC.php';
require_once '../models/panier.php';

    // Retrieve form data
  
    $produit_id = intval($_POST['produit_id']);
    $quantity = $_POST['quantity'];
    // Create a new produit object with the form data
    $newPanier = new panier($produit_id,$quantity);

    // Initialize the produit controller
    $panierController = new panierC;
    
    // Add the produit to the database
    $panierController->AjouterPanier($newPanier);

    // Redirect to a different page or display a success message here
   // header("Location: success_page.php");
    exit();

?>
