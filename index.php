<?php

require 'config.php';

require 'classes/Customer.php';

require 'classes/Product.php';

require 'classes/Order.php';



// $customer = Customer::create("Agung Saputra", "Cileungsi", "895337305533", $pdo);
$customer = Customer::create("Agung Percobaan 2", "Cileungsi", "895337305533", $pdo);

// $product = Product::create("laptop", 1200.00, $pdo);
$product = Product::create("Komputer", 1800.00, $pdo);

$order = Order::create($customer->customerID, date("Y-m-d"), $pdo);

$order->addLineItem($product->productID, 1, $product->unitPrice, $pdo);

echo "Order for {$customer->name} created with total of 1 item.\n";

?>