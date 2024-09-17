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

// Check if the ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch the product details
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        
        // Date calculations
        function addMonths($date, $months) {
            $dateObj = DateTime::createFromFormat('Y-m-d', $date);
            $dateObj->modify("+{$months} months");
            return $dateObj->format('Y-m-d');
        }

        $first_test = $product['first_test'];
        $product['second_test'] = addMonths($first_test, 3);
        $product['third_test'] = addMonths($product['second_test'], 3);
        $product['fourth_test'] = addMonths($product['third_test'], 3);
        $product['fifth_test'] = addMonths($product['fourth_test'], 6);
        $product['sixth_test'] = addMonths($product['fifth_test'], 6);
        $product['seventh_test'] = addMonths($product['sixth_test'], 12);

    } else {
        echo "Product not found.";
        exit;
    }
} else {
    echo "No ID provided.";
    exit;
}

// Close the connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>View Product</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center">Product Details</h2>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo htmlspecialchars($product['product_name']); ?></h5>
        <p><strong>Brand Name:</strong> <?php echo htmlspecialchars($product['brand_name']); ?></p>
        <p><strong>Lot No:</strong> <?php echo htmlspecialchars($product['lot_no']); ?></p>
        <p><strong>MFG Date:</strong> <?php echo htmlspecialchars($product['mfg_date']); ?></p>
        <p><strong>Expiry Date:</strong> <?php echo htmlspecialchars($product['expiry_date']); ?></p>
        <p><strong>Packing:</strong> <?php echo htmlspecialchars($product['packing']); ?></p>
        <p><strong>Storage Temp:</strong> <?php echo htmlspecialchars($product['storage_temp']); ?></p>
        <p><strong>RH:</strong> <?php echo htmlspecialchars($product['rh']); ?></p>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($product['description']); ?></p>
        <p><strong>Identification:</strong> <?php echo htmlspecialchars($product['identification']); ?></p>
        <p><strong>Weight:</strong> <?php echo htmlspecialchars($product['weight']); ?></p>
        <p><strong>Disintegration Time:</strong> <?php echo htmlspecialchars($product['disintegration_time']); ?></p>
        <p><strong>Moisture Content:</strong> <?php echo htmlspecialchars($product['moisture_content']); ?></p>
        <p><strong>Dosage Unit:</strong> <?php echo htmlspecialchars($product['dosage_unit']); ?></p>
        <p><strong>Bacterial Count:</strong> <?php echo htmlspecialchars($product['bacterial_count']); ?></p>
        <p><strong>Molds/Yeast Count:</strong> <?php echo htmlspecialchars($product['molds_yeast_count']); ?></p>
        <p><strong>Salmonella:</strong> <?php echo htmlspecialchars($product['salmonella'] ? 'Yes' : 'No'); ?></p>
        <p><strong>Escherichia Coli:</strong> <?php echo htmlspecialchars($product['escherichia_coli'] ? 'Yes' : 'No'); ?></p>
        <p><strong>Staphylococcus Aureus:</strong> <?php echo htmlspecialchars($product['staphylococcus_aureus'] ? 'Yes' : 'No'); ?></p>
        <p><strong>Sodium Ascorbate:</strong> <?php echo htmlspecialchars($product['sodium_ascorbate']); ?></p>
        <p><strong>Zinc Sulfate:</strong> <?php echo htmlspecialchars($product['zinc_sulfate']); ?></p>
        <p><strong>1st Testing:</strong> <?php echo htmlspecialchars($product['first_test']); ?></p>
        <p><strong>2nd Testing:</strong> <?php echo htmlspecialchars($product['second_test']); ?></p>
        <p><strong>3rd Testing:</strong> <?php echo htmlspecialchars($product['third_test']); ?></p>
        <p><strong>4th Testing:</strong> <?php echo htmlspecialchars($product['fourth_test']); ?></p>
        <p><strong>5th Testing:</strong> <?php echo htmlspecialchars($product['fifth_test']); ?></p>
        <p><strong>6th Testing:</strong> <?php echo htmlspecialchars($product['sixth_test']); ?></p>
        <p><strong>7th Testing:</strong> <?php echo htmlspecialchars($product['seventh_test']); ?></p>
        <a href="stability.php" class="btn btn-primary">Back to Products</a>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
