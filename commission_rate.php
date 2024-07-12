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


// CommissionRate class
class CommissionRate {
    private $id;
    private $product_id;
    private $rate_type;
    private $rate_value;

    public function __construct($id, $product_id, $rate_type, $rate_value) {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->rate_type = $rate_type;
        $this->rate_value = $rate_value;
    }

    public function getId() {
        return $this->id;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function getRateType() {
        return $this->rate_type;
    }

    public function getRateValue() {
        return $this->rate_value;
    }
}

// Create commission rate
if (isset($_POST['create_commission_rate'])) {
    $product_id = $_POST['product_id'];
    $rate_type = $_POST['rate_type'];
    $rate_value = $_POST['rate_value'];

    $query = "INSERT INTO commission_rates (product_id, rate_type, rate_value) VALUES (?,?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isi", $product_id, $rate_type, $rate_value);
    $stmt->execute();

    $commission_rate_id = $conn->insert_id;
    $commission_rate = new CommissionRate($commission_rate_id, $product_id, $rate_type, $rate_value);
}

// Get all commission rates
$query = "SELECT * FROM commission_rates";
$result = $conn->query($query);
$commission_rates = array();
while ($row = $result->fetch_assoc()) {
    $commission_rate = new CommissionRate($row['id'], $row['product_id'], $row['rate_type'], $row['rate_value']);
    $commission_rates[] = $commission_rate;
}

// Close database connection
$conn->close();
?>