<?php

class LineItem {

    public $lineItemID;

    public $orderID;

    public $productID;

    public $quantity;

    public $price;



    public function __construct($lineItemID, $orderID, $productID, $quantity, $price) {

        $this->lineItemID = $lineItemID;

        $this->orderID = $orderID;

        $this->productID = $productID;

        $this->quantity = $quantity;

        $this->price = $price;

    }



    public static function create($orderID, $productID, $quantity, $price, $pdo) {

        $sql = "INSERT INTO line_items (orderID, productID, quantity, price) VALUES (?, ?, ?, ?)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$orderID, $productID, $quantity, $price]);

        return new self($pdo->lastInsertId(), $orderID, $productID, $quantity, $price);

    }

}

?>