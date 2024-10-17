<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

// Insert Manufacturer
if (isset($_POST['insertManufacturerBtn'])) {
	$query = insertManufacturers($pdo, $_POST['company_name'], $_POST['founding_date'], $_POST['specialization']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}
}

// Edit Manufacturer
if (isset($_POST['editManufacturerBtn'])) {
	$query = updateManufacturers($pdo, $_POST['company_name'], $_POST['founding_date'], $_POST['specialization'], $_GET['manufacturer_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Edit failed";
	}
}

// Delete Manufacturer
if (isset($_POST['deleteManufacturerBtn'])) {
    $query = deleteManufacturers($pdo, $_GET['manufacturer_id']);
    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Deletion failed";
    }
}


// Insert Product
if (isset($_POST['insertProductBtn'])) {
	$query = insertProducts($pdo, $_POST['manufacturer_id'], $_POST['product_name'], $_POST['date_manufactured'], $_POST['quantity'], $_POST['price'], $_POST['brand'], $_POST['warranty_period']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Insertion failed";
	}
}

// Edit Product
if (isset($_POST['editProductBtn'])) {
	$query = updateProducts($pdo, $_POST['manufacturer_id'], $_POST['product_name'], $_POST['date_manufactured'], $_POST['quantity'], $_POST['price'], $_POST['brand'], $_POST['warranty_period']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Edit failed";
	}
}

// Delete Product
// Fix this line
if (isset($_POST['deleteProductBtn'])) {
    $query = deleteProducts($pdo, $_GET['product_id']);
    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Deletion failed";
    }
}




