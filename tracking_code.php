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

// TrackingCode class
class TrackingCode {
    private $id;
    private $product_id;
    private $code;

    public function __construct($id, $product_id, $code) {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->code = $code;
    }

    public function getId() {
        return $this->id;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function getCode() {
        return $this->code;
    }
}

// Create tracking code
if (isset($_POST['create_tracking_code'])) {
    $product_id = $_POST['product_id'];
    $code = $_POST['code'];

    $query = "INSERT INTO tracking_codes (product_id, code) VALUES (?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $product_id, $code);
    $stmt->execute();

    $tracking_code_id = $conn->insert_id;
    $tracking_code = new TrackingCode($tracking_code_id, $product_id, $code);
}

// Get all tracking codes
$query = "SELECT * FROM tracking_codes";
$result = $conn->query($query);
$tracking_codes = array();
while ($row = $result->fetch_assoc()) {
    $tracking_code = new TrackingCode($row['id'], $row['product_id'], $row['code']);
    $tracking_codes[] = $tracking_code;
}

// Close database connection
$conn->close();
?>