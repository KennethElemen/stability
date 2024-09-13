<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharma_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
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
$salmonella = $_POST['salmonella'];
$escherichia_coli = $_POST['escherichia_coli'];
$staphylococcus_aureus = $_POST['staphylococcus_aureus'];

$sql = "UPDATE products SET 
    product_name = ?, 
    brand_name = ?, 
    lot_no = ?, 
    mfg_date = ?, 
    expiry_date = ?, 
    packing = ?, 
    storage_temp = ?, 
    rh = ?, 
    description = ?, 
    identification = ?, 
    weight = ?, 
    disintegration_time = ?, 
    moisture_content = ?, 
    dosage_unit = ?, 
    bacterial_count = ?, 
    molds_yeast_count = ?, 
    salmonella = ?, 
    escherichia_coli = ?, 
    staphylococcus_aureus = ? 
    WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssssssssssssssi", $product_name, $brand_name, $lot_no, $mfg_date, $expiry_date, $packing, $storage_temp, $rh, $description, $identification, $weight, $disintegration_time, $moisture_content, $dosage_unit, $bacterial_count, $molds_yeast_count, $salmonella, $escherichia_coli, $staphylococcus_aureus, $id);

if ($stmt->execute()) {
    header("Location: stability.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
