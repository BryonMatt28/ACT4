<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'dbConfig.php'; 
require_once 'models.php'; 

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    
    // Fetch the product's current details
    $product = getProductById($pdo, $product_id); // Ensure this function is implemented
    
    if (!$product) {
        echo "Product not found.";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $query = updateProducts($pdo, $_POST['manufacturer_id'], $_POST['product_name'], $_POST['date_manufactured'], $_POST['quantity'], $_POST['price'], $_POST['brand'], $_POST['warranty_period'], $product_id);

        if ($query) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Edit failed";
        }
    }
} else {
    echo "No product ID provided";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            color: #2c3e50;
            text-align: center;
        }
        form {
            background: #f9f9f9;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="POST">
        <label for="manufacturer_id">Manufacturer ID</label>
        <input type="number" name="manufacturer_id" id="manufacturer_id" value="<?php echo htmlspecialchars($product['manufacturer_id']); ?>" required>
        
        <label for="product_name">Product Name</label>
        <input type="text" name="product_name" id="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>" required>
        
        <label for="date_manufactured">Date Manufactured</label>
        <input type="date" name="date_manufactured" id="date_manufactured" value="<?php echo htmlspecialchars($product['date_manufactured']); ?>" required>
        
        <label for="quantity">Quantity</label>
        <input type="number" name="quantity" id="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>" required>
        
        <label for="price">Price</label>
        <input type="number" step="0.01" name="price" id="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
        
        <label for="brand">Brand</label>
        <input type="text" name="brand" id="brand" value="<?php echo htmlspecialchars($product['brand']); ?>" required>
        
        <label for="warranty_period">Warranty Period (months)</label>
        <input type="number" name="warranty_period" id="warranty_period" value="<?php echo htmlspecialchars($product['warranty_period']); ?>" required>
        
        <input type="submit" value="Update Product">
    </form>
</body>
</html>
