<?php
require_once '../config.php';
require_once '../models/category.php';

class categoryC
{


    public function AjouterCategory($category)
    {
        $db = config::getConnexion();
        $sql = "INSERT INTO `category` (`id`,`nom`) VALUES (:id, :nom)";

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $category->getId());
            $query->bindValue(':nom', $category->getNom());

            $success = $query->execute();

            if ($success) {
                // Insertion was successful
                echo 'category added successfully.';
            } else {
                // Insertion failed
                echo 'Failed to add category.';
            }
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    public function AfficherCategory()
    {
        $sql = 'SELECT * FROM `category`';
        $db = config::getConnexion();

        try {
            $stmt = $db->query($sql);
            $produits = array(); // Initialize an array to store produit objects

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Create a new produit object for each row of data
                $category = new category($row['id'], $row['nom']);
                $categorys[] = $category; // Add the produit object to the array
            }

            return $categorys; // Return the array of produit objects
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    // ...
    public function supprimerCategory($id)
{
    $sql = "DELETE FROM `category` where id= :id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);
    try {
        $req->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

public function modifierCategory($categorys,$id){
    $sql = "UPDATE category SET  nom=:nom where id=:id";
    $db = config::getConnexion();
    try {
        $req = $db->prepare($sql);
       
        $nom = $categorys->getNom();

        $req->bindValue(':nom', $nom);
    
        $req->bindValue(':id', $id);
        $req->execute();

    } catch (Exception $e) {
        echo " Erreur ! " . $e->getMessage();
    }
}

public function afficherCategoryParId($id){
    $sql = "SELECT * FROM category where id=$id";
    $db = config::getConnexion();
    try {

        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    } 
}



}

?>