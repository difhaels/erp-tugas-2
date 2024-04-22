<?php

require_once 'LineItem.php';



class Order {

    public $orderID;

    public $customerID;

    public $orderDate;

    public $lineItems = [];



    public function __construct($orderID, $customerID, $orderDate) {

        $this->orderID = $orderID;

        $this->customerID = $customerID;

        $this->orderDate = $orderDate;

    }



    public static function create($customerID, $orderDate, $pdo) {

        $sql = "INSERT INTO orders (customerID, orderDate) VALUES (?, ?)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$customerID, $orderDate]);

        return new self($pdo->lastInsertId(), $customerID, $orderDate);

    }



    public function addLineItem($productID, $quantity, $price, $pdo) {

        $lineItem = LineItem::create($this->orderID, $productID, $quantity, $price, $pdo);

        $this->lineItems[] = $lineItem;

    }

}

?>