<?php

class produit {
    private int $id;
    private string $namep;
    private int $price;
    private int $category_id;

   

    public function __construct(int $id, string $namep,int $price,int $category_id) {
        $this->id=$id;
        $this->namep=$namep;
        $this->price=$price;
        $this->category_id=$category_id;
    }

  

    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getNamep() {
        return $this->namep;
    }

    public function setNamep(string $namep) {
        $this->namep = $namep;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice(int $price) {
        $this->price = $price;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function setCategoryId(int $category_id) {
        $this->category_id = $category_id;
    }
}
?>
