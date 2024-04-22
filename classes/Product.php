<?php

class Product {

    public $productID;

    public $productName;

    public $unitPrice;



    public function __construct($productID, $productName, $unitPrice) {

        $this->productID = $productID;

        $this->productName = $productName;

        $this->unitPrice = $unitPrice;

    }



    public static function create($productName, $unitPrice, $pdo) {

        $sql = "INSERT INTO products (productName, unitPrice) VALUES (?, ?)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$productName, $unitPrice]);

        return new self($pdo->lastInsertId(), $productName, $unitPrice);

    }

}

?>