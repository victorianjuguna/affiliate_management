<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'product_management';

// Connect to database
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// ProductTag class
class ProductTag {
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

// Create product tag
if (isset($_POST['create_product_tag'])) {
    $name = $_POST['name'];

    $query = "INSERT INTO product_tags (name) VALUES (?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $name);
    $stmt->execute();

    $product_tag_id = $conn->insert_id;
    $product_tag = new ProductTag($product_tag_id, $name);
}

// Get all product tags
$query = "SELECT * FROM product_tags";
$result = $conn->query($query);
$product_tags = array();
while ($row = $result->fetch_assoc()) {
    $product_tag = new ProductTag($row['id'], $row['name']);
    $product_tags[] = $product_tag;
}

// Close database connection
$conn->close();
?>