<?php

// Insert Manufacturer Function
function insertManufacturers($pdo, $company_name, $founding_date, $specialization) {
    $sql = "INSERT INTO manufacturers (company_name, founding_date, specialization) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$company_name, $founding_date, $specialization]);

    return $executeQuery ? true : false;
}

// Update Manufacturer Function
function updateManufacturers($pdo, $company_name, $founding_date, $specialization, $manufacturer_id) {
    $sql = "UPDATE manufacturers SET company_name = ?, founding_date = ?, specialization = ? WHERE manufacturer_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$company_name, $founding_date, $specialization, $manufacturer_id]);

    return $executeQuery ? true : false;
}

// Delete Manufacturer Function
function deleteManufacturers($pdo, $manufacturer_id) {
    $sql = "DELETE FROM manufacturers WHERE manufacturer_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$manufacturer_id]);

    return $executeQuery ? true : false;
}

// Insert Product Function
function insertProducts($pdo, $manufacturer_id, $product_name, $date_manufactured, $quantity, $price, $brand, $warranty_period) {
    $sql = "INSERT INTO products (manufacturer_id, product_name, date_manufactured, quantity, price, brand, warranty_period) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$manufacturer_id, $product_name, $date_manufactured, $quantity, $price, $brand, $warranty_period]);

    return $executeQuery ? true : false;
}

function updateProducts($pdo, $manufacturer_id, $product_name, $date_manufactured, $quantity, $price, $brand, $warranty_period, $product_id) {
    $sql = "UPDATE Products SET manufacturer_id = ?, product_name = ?, date_manufactured = ?, quantity = ?, price = ?, brand = ?, warranty_period = ? WHERE product_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$manufacturer_id, $product_name, $date_manufactured, $quantity, $price, $brand, $warranty_period, $product_id]);
}


// Delete Product Function
function deleteProducts($pdo, $product_id) {
    $deleteProduct = "DELETE FROM Products WHERE product_id = ?";
    $deleteStmt = $pdo->prepare($deleteProduct);
    $executeDeleteQuery = $deleteStmt->execute([$product_id]); // Correct argument here

    if ($executeDeleteQuery) {
        return true;
    } else {
        return false;
    }
}

// Get All Manufacturers
function getAllManufacturers($pdo) {
    $sql = "SELECT * FROM manufacturers";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    return $executeQuery ? $stmt->fetchAll() : [];
}

// Get All Products
function getAllProducts($pdo) {
    $sql = "SELECT * FROM products";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    return $executeQuery ? $stmt->fetchAll() : [];
}

function getManufacturerById($pdo, $manufacturer_id) {
    $sql = "SELECT * FROM manufacturers WHERE manufacturer_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$manufacturer_id]);
    return $stmt->fetch();
}

function getProductById($pdo, $product_id) {
    $sql = "SELECT * FROM Products WHERE product_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$product_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch as associative array
}

