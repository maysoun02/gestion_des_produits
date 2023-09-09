<?php

class panier {
    private int $id;
    private int $produit_id;
    private int $quantity;

    public function __construct(int $produit_id, int $quantity) {
        $this->produit_id = $produit_id;
        $this->quantity = $quantity;
    }

    public function getId() {
        return $this->id;
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function getProduitId() {
        return $this->produit_id;
    }

    public function setProduitId(int $produit_id) {
        $this->produit_id = $produit_id;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity(int $quantity) {
        $this->quantity = $quantity;
    }
}
?>
