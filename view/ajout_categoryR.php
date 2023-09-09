<?php
require_once '../controllers/categoryC.php';
require_once '../models/category.php';

    // Retrieve form data
    $id = $_POST['id'];
    $nom = $_POST['nom'];

    // Create a new produit object with the form data
    $newCategory = new category($id,$nom);

    // Initialize the produit controller
    $categoryController = new categoryC;

    // Add the produit to the database
    $categoryController->AjouterCategory($newCategory);

    // Redirect to a different page or display a success message here
   // header("Location: success_page.php");
    exit();

?>
