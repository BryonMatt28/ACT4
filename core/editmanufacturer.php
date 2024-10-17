<?php 
require_once 'dbConfig.php'; 
require_once 'models.php'; 

if (isset($_GET['manufacturer_id'])) {
    $manufacturer_id = $_GET['manufacturer_id'];
    
    // Fetch the manufacturer's current details
    $manufacturer = getManufacturerById($pdo, $manufacturer_id); // You'll need to implement this function
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $query = updateManufacturers($pdo, $_POST['company_name'], $_POST['founding_date'], $_POST['specialization'], $manufacturer_id);

        if ($query) {
            header("Location: ../index.php");
            exit();
        } else {
            echo "Edit failed";
        }
    }
} else {
    echo "No manufacturer ID provided";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Manufacturer</title>
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
        input[type="submit"] {
            background: #3498db;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background: #2980b9;
        }
    </style>
</head>
<body>
    <h1>Edit Manufacturer</h1>
    <form action="" method="POST">
        <label for="company_name">Company Name</label>
        <input type="text" name="company_name" id="company_name" value="<?php echo htmlspecialchars($manufacturer['company_name']); ?>" required>
        
        <label for="founding_date">Founding Date</label>
        <input type="date" name="founding_date" id="founding_date" value="<?php echo htmlspecialchars($manufacturer['founding_date']); ?>" required>
        
        <label for="specialization">Specialization</label>
        <input type="text" name="specialization" id="specialization" value="<?php echo htmlspecialchars($manufacturer['specialization']); ?>" required>
        
        <input type="submit" name="editManufacturerBtn" value="Update Manufacturer">
    </form>
</body>
</html>
