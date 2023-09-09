<?php
require_once '../config.php';
require_once '../models/produit.php';

class produitC
{


    public function AjouterProduit($produit)
    {
        $db = config::getConnexion();
        $sql = "INSERT INTO `produit` (`id`,`namep`, `price`, `category_id`) VALUES (:id, :namep, :price, :category_id)";

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id', $produit->getId());
            $query->bindValue(':namep', $produit->getNamep());
            $query->bindValue(':price', $produit->getPrice());
            $query->bindValue(':category_id', $produit->getCategoryId());

            $success = $query->execute();

            if ($success) {
                // Insertion was successful
                echo 'produit added successfully.';
            } else {
                // Insertion failed
                echo 'Failed to add produit.';
            }
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    public function AfficherProduit()
    {
        $sql = 'SELECT * FROM `produit`';
        $db = config::getConnexion();

        try {
            $stmt = $db->query($sql);
            $produits = array(); // Initialize an array to store produit objects

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Create a new produit object for each row of data
                $produit = new produit($row['id'], $row['namep'], $row['price'], $row['category_id']);
                $produits[] = $produit; // Add the produit object to the array
            }

            return $produits; // Return the array of produit objects
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }


    // ...
    public function supprimerProducts($id)
{
    $sql = "DELETE FROM `produit` where id= :id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);
    try {
        $req->execute();
    } catch (Exception $e) {
        die('Erreur: ' . $e->getMessage());
    }
}

public function modifierProduit($produits,$id){
    $sql = "UPDATE produit SET  namep=:namep,price=:price,category_id=:category_id where id=:id";
    $db = config::getConnexion();
    try {
        $req = $db->prepare($sql);
       
        $namep = $produits->getNamep();
        $price = $produits->getPrice();
        $category_id = $produits->getCategoryId();
       


        $req->bindValue(':namep', $namep);
        $req->bindValue(':price', $price);
        $req->bindValue(':category_id', $category_id);

        $req->bindValue(':id', $id);


        $req->execute();

    } catch (Exception $e) {
        echo " Erreur ! " . $e->getMessage();
    }
}

public function afficherProduitParId($id){
    $sql = "SELECT * FROM produit where id=$id";
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