<?php 
require_once 'dbConfig.php'; 
require_once 'models.php'; 

if (isset($_GET['manufacturer_id'])) {
    $manufacturer_id = $_GET['manufacturer_id'];
    $query = deleteManufacturers($pdo, $manufacturer_id);

    if ($query) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Deletion failed";
    }
} else {
    echo "No manufacturer ID provided";
}
?>
