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
    die("Connection failed: " . $conn->connect_error);
}

// Product class
class Product {
    private $id;
    private $name;
    private $description;
    private $image_url;

    public function __construct($id, $name, $description, $image_url) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->image_url = $image_url;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImageUrl() {
        return $this->image_url;
    }
}

// Create product
if (isset($_POST['create_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    $query = "INSERT INTO products (name, description, image_url) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $name, $description, $image_url);
    $stmt->execute();

    $product_id = $conn->insert_id;
    $product = new Product($product_id, $name, $description, $image_url);
}

// Get all products
$query = "SELECT * FROM products";
$result = $conn->query($query);
$products = array();
while ($row = $result->fetch_assoc()) {
    $product = new Product($row['id'], $row['name'], $row['description'], $row['image_url']);
    $products[] = $product;
}

// Close database connection
$conn->close();
?>