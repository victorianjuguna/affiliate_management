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

// AffiliateLink class
class AffiliateLink {
    private $id;
    private $product_id;
    private $link_url;

    public function __construct($id, $product_id, $link_url) {
        $this->id = $id;
        $this->product_id = $product_id;
        $this->link_url = $link_url;
    }

    public function getId() {
        return $this->id;
    }

    public function getProductId() {
        return $this->product_id;
    }

    public function getLinkUrl() {
        return $this->link_url;
    }
}

// Create affiliate link
if (isset($_POST['create_affiliate_link'])) {
    $product_id = $_POST['product_id'];
    $link_url = $_POST['link_url'];

    $query = "INSERT INTO affiliate_links (product_id, link_url) VALUES (?,?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("is", $product_id, $link_url);
    $stmt->execute();

    $affiliate_link_id = $conn->insert_id;
    $affiliate_link = new AffiliateLink($affiliate_link_id, $product_id, $link_url);
}

// Get all affiliate links
$query = "SELECT * FROM affiliate_links";
$result = $conn->query($query);
$affiliate_links = array();
while ($row = $result->fetch_assoc()) {
    $affiliate_link = new AffiliateLink($row['id'], $row['product_id'], $row['link_url']);
    $affiliate_links[] = $affiliate_link;
}

// Close database connection
$conn->close();
?>