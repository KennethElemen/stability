<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharma_db";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch product data based on the provided ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    
    // Check if the product was found
    if (!$product) {
        die("Product not found.");
    }
} else {
    die("Product ID is required.");
}

// Check if the form was submitted to update the product
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Update product
    $stmt = $conn->prepare("UPDATE products SET product_name = ?, brand_name = ?, lot_no = ?, mfg_date = ?, expiry_date = ?, packing = ?, storage_temp = ?, rh = ?, description = ?, identification = ?, weight = ?, disintegration_time = ?, moisture_content = ?, dosage_unit = ?, bacterial_count = ?, molds_yeast_count = ?, salmonella = ?, escherichia_coli = ?, staphylococcus_aureus = ? WHERE id = ?");
    $stmt->bind_param("sssssssssssssssssssi", $product_name, $brand_name, $lot_no, $mfg_date, $expiry_date, $packing, $storage_temp, $rh, $description, $identification, $weight, $disintegration_time, $moisture_content, $dosage_unit, $bacterial_count, $molds_yeast_count, $salmonella, $escherichia_coli, $staphylococcus_aureus, $id);

    if ($stmt->execute()) {
        header("Location: stability.php"); // Redirect to stability.php after update
        exit();
    } else {
        echo "<div class='alert alert-danger'>Error updating record: " . $stmt->error . "</div>";
    }

    // Close statement
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Product</h2>

        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">

            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="brand_name">Brand Name</label>
                <input type="text" class="form-control" id="brand_name" name="brand_name" value="<?php echo htmlspecialchars($product['brand_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="lot_no">Lot No</label>
                <input type="text" class="form-control" id="lot_no" name="lot_no" value="<?php echo htmlspecialchars($product['lot_no']); ?>" required>
            </div>
            <div class="form-group">
                <label for="mfg_date">MFG Date</label>
                <input type="date" class="form-control" id="mfg_date" name="mfg_date" value="<?php echo htmlspecialchars($product['mfg_date']); ?>" required>
            </div>
            <div class="form-group">
                <label for="expiry_date">Expiry Date</label>
                <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="<?php echo htmlspecialchars($product['expiry_date']); ?>" required>
            </div>
            <div class="form-group">
                <label for="packing">Packing</label>
                <input type="text" class="form-control" id="packing" name="packing" value="<?php echo htmlspecialchars($product['packing']); ?>">
            </div>
            <div class="form-group">
                <label for="storage_temp">Storage Temp</label>
                <input type="text" class="form-control" id="storage_temp" name="storage_temp" value="<?php echo htmlspecialchars($product['storage_temp']); ?>">
            </div>
            <div class="form-group">
                <label for="rh">RH</label>
                <input type="text" class="form-control" id="rh" name="rh" value="<?php echo htmlspecialchars($product['rh']); ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"><?php echo htmlspecialchars($product['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="identification">Identification</label>
                <input type="text" class="form-control" id="identification" name="identification" value="<?php echo htmlspecialchars($product['identification']); ?>">
            </div>
            <div class="form-group">
                <label for="weight">Weight</label>
                <input type="number" step="0.01" class="form-control" id="weight" name="weight" value="<?php echo htmlspecialchars($product['weight']); ?>">
            </div>
            <div class="form-group">
                <label for="disintegration_time">Disintegration Time</label>
                <input type="text" class="form-control" id="disintegration_time" name="disintegration_time" value="<?php echo htmlspecialchars($product['disintegration_time']); ?>">
            </div>
            <div class="form-group">
                <label for="moisture_content">Moisture Content</label>
                <input type="text" step="0.01" class="form-control" id="moisture_content" name="moisture_content" value="<?php echo htmlspecialchars($product['moisture_content']); ?>">
            </div>
            <div class="form-group">
                <label for="dosage_unit">Dosage Unit</label>
                <input type="text" class="form-control" id="dosage_unit" name="dosage_unit" value="<?php echo htmlspecialchars($product['dosage_unit']); ?>">
            </div>
            <div class="form-group">
                <label for="bacterial_count">Bacterial Count</label>
                <input type="number" class="form-control" id="bacterial_count" name="bacterial_count" value="<?php echo htmlspecialchars($product['bacterial_count']); ?>">
            </div>
            <div class="form-group">
                <label for="molds_yeast_count">Molds/Yeast Count</label>
                <input type="number" class="form-control" id="molds_yeast_count" name="molds_yeast_count" value="<?php echo htmlspecialchars($product['molds_yeast_count']); ?>">
            </div>
            <div class="form-group">
                <label for="salmonella">Salmonella</label>
                <select class="form-control" id="salmonella" name="salmonella">
                    <option value="0" <?php echo ($product['salmonella'] == 0) ? 'selected' : ''; ?>>No</option>
                    <option value="1" <?php echo ($product['salmonella'] == 1) ? 'selected' : ''; ?>>Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="escherichia_coli">Escherichia Coli</label>
                <select class="form-control" id="escherichia_coli" name="escherichia_coli">
                    <option value="0" <?php echo ($product['escherichia_coli'] == 0) ? 'selected' : ''; ?>>No</option>
                    <option value="1" <?php echo ($product['escherichia_coli'] == 1) ? 'selected' : ''; ?>>Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="staphylococcus_aureus">Staphylococcus Aureus</label>
                <select class="form-control" id="staphylococcus_aureus" name="staphylococcus_aureus">
                    <option value="0" <?php echo ($product['staphylococcus_aureus'] == 0) ? 'selected' : ''; ?>>No</option>
                    <option value="1" <?php echo ($product['staphylococcus_aureus'] == 1) ? 'selected' : ''; ?>>Yes</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
