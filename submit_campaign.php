<?php
// Include database connection
include 'db.php';

// Get form data
$campaign_name = $_POST['campaign_name'];
$budget = $_POST['budget'];
$description = $_POST['description'];
$affiliates = $_POST['affiliates']; // Array of affiliate IDs

// Start a transaction
$conn->begin_transaction();

try {
    // Insert into campaigns table
    $stmt = $conn->prepare("INSERT INTO campaigns (name, budget, description) VALUES (?, ?, ?)");
    if ($stmt === false) {
        throw new Exception('Prepare statement failed: ' . $conn->error);
    }
    $stmt->bind_param("sds", $campaign_name, $budget, $description);
    if (!$stmt->execute()) {
        throw new Exception('Execute failed: ' . $stmt->error);
    }

    // Get the last inserted campaign ID
    $campaign_id = $stmt->insert_id;
    $stmt->close(); // Close the statement for campaigns

    // Prepare statement for checking affiliate existence
    $check_affiliate = $conn->prepare("SELECT COUNT(*) FROM affiliates WHERE id = ?");
    if ($check_affiliate === false) {
        throw new Exception('Prepare statement failed: ' . $conn->error);
    }

    // Insert into campaign_affiliates table
    $insert_affiliate = $conn->prepare("INSERT INTO campaign_affiliates (campaign_id, affiliate_id) VALUES (?, ?)");
    if ($insert_affiliate === false) {
        throw new Exception('Prepare statement failed: ' . $conn->error);
    }
    
    foreach ($affiliates as $affiliate_id) {
        // Check if affiliate exists
        $check_affiliate->bind_param("i", $affiliate_id);
        if (!$check_affiliate->execute()) {
            throw new Exception('Execute failed: ' . $check_affiliate->error);
        }

        // Get the result
        $check_affiliate->bind_result($count);
        $check_affiliate->fetch();

        // If the affiliate does not exist, throw an exception
        if ($count == 0) {
            throw new Exception("Affiliate with ID $affiliate_id does not exist.");
        }

        // Insert the valid affiliate into campaign_affiliates
        $insert_affiliate->bind_param("ii", $campaign_id, $affiliate_id);
        if (!$insert_affiliate->execute()) {
            throw new Exception('Execute failed: ' . $insert_affiliate->error);
        }
    }

    // Close the prepared statements
    $check_affiliate->close();
    $insert_affiliate->close();

    // Commit transaction
    $conn->commit();

    // Redirect to success page or display success message
    echo "Campaign created successfully!";
} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();

    // Display error message
    echo "Failed to create campaign: " . $e->getMessage();
}

// Close connection
$conn->close();
?>
