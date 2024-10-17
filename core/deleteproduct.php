<?php 
require_once 'dbConfig.php'; 
require_once 'models.php'; 

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $query = deleteProducts($pdo, $product_id);

    if ($query) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Deletion failed";
    }
} else {
    echo "No product ID provided";
}
?>
