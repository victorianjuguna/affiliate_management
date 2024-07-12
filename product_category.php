<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'affiliate_management';

// Connect to database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// ProductCategory class
class ProductCategory {
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
}

// Create product category
if (isset($_POST['create_product_category'])) {
    $name = $_POST['name'];

    $query = "INSERT INTO product_categories (name) VALUES (?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $name);
    $stmt->execute();

    $product_category_id = $conn->insert_id;
    $product_category = new ProductCategory($product_category_id, $name);
}

// Get all product categories
$query = "SELECT * FROM product_categories";
$result = $conn->query($query);
$product_categories = array();
while ($row = $result->fetch_assoc()) {
    $product_category = new ProductCategory($row['id'], $row['name']);
    $product_categories[] = $product_category;
}

// Close database connection
$conn->close();
?>