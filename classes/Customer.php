<?php

class Customer {

    public $customerID;

    public $name;

    public $address;

    public $phone;



    public function __construct($customerID, $name, $address, $phone) {

        $this->customerID = $customerID;

        $this->name = $name;

        $this->address = $address;

        $this->phone = $phone;

    }



    public static function create($name, $address, $phone, $pdo) {

        $sql = "INSERT INTO customers (name, address, phone) VALUES (?, ?, ?)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$name, $address, $phone]);

        return new self($pdo->lastInsertId(), $name, $address, $phone);

    }

}