<?php
require_once '../config.php';
require_once '../models/panier.php';

class panierC
{


    public function AjouterPanier($panier)
    {
        $db = config::getConnexion();
        $sql = "INSERT INTO `panier` (`produit_id`,`quantity`) VALUES (:produit_id, :quantity)";

        try {
            $query = $db->prepare($sql);
            $query->bindValue(':produit_id', $panier->getProduitId());
            $query->bindValue(':quantity', $panier->getQuantity());

            $success = $query->execute();

            if ($success) {
                // Insertion was successful
                echo 'produit added in panier successfully.';
            } else {
                // Insertion failed
                echo 'Failed to add product.';
            }
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }


    public function AfficherPanier()
    {
        $sql = 'SELECT * FROM `panier`';
        $db = config::getConnexion();

        try {
            $stmt = $db->query($sql);
            $produits = array(); // Initialize an array to store produit objects

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                // Create a new produit object for each row of data
                $panier = new panier($row['produit_id'], $row['quantity']);
                $paniers[] = $panier; // Add the produit object to the array
            }

            return $paniers; // Return the array of produit objects
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }



}

?>