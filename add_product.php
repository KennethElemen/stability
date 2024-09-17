<?php
// Database connection
$servername = "localhost"; // Replace with your server details
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "pharma_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_name = $_POST['product_name'];
    $brand_name = $_POST['brand_name'];
    $lot_no = $_POST['lot_no'];
    $mfg_date = $_POST['mfg_date'];
    $expiry_date = $_POST['expiry_date'];
    $packing = $_POST['packing'];
    $storage_temp = $_POST['storage_temp'];
    $rh = $_POST['rh'];
    $description = $_POST['description'];
    $identification = $_POST['identification'];
    $weight = $_POST['weight'];
    $disintegration_time = $_POST['disintegration_time'];
    $moisture_content = $_POST['moisture_content'];
    $dosage_unit = $_POST['dosage_unit'];
    $bacterial_count = $_POST['bacterial_count'];
    $molds_yeast_count = $_POST['molds_yeast_count'];
    $salmonella = isset($_POST['salmonella']) ? 1 : 0;
    $escherichia_coli = isset($_POST['escherichia_coli']) ? 1 : 0;
    $staphylococcus_aureus = isset($_POST['staphylococcus_aureus']) ? 1 : 0;
    $sodium_ascorbate = $_POST['sodium_ascorbate'];
    $zinc_sulfate = $_POST['zinc_sulfate']; 
    $first_test = $_POST['first_test']; 

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO products (product_name, brand_name, lot_no, mfg_date, expiry_date, packing, storage_temp, rh, description, identification, weight, disintegration_time, moisture_content, dosage_unit, bacterial_count, molds_yeast_count, salmonella, escherichia_coli, staphylococcus_aureus, sodium_ascorbate,zinc_sulfate,first_test) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)");
    $stmt->bind_param("ssssssssssddsiiiiissss", $product_name, $brand_name, $lot_no, $mfg_date, $expiry_date, $packing, $storage_temp, $rh, $description, $identification, $weight, $disintegration_time, $moisture_content, $dosage_unit, $bacterial_count, $molds_yeast_count, $salmonella, $escherichia_coli, $staphylococcus_aureus, $sodium_ascorbate, $zinc_sulfate, $first_test);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect back to the main page with success
        header('Location: stability.php?success=1');
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
