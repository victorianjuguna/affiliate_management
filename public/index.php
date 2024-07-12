<?php
// Include all the classes
require_once 'product.php';
require_once 'commission_rate.php';
require_once 'tracking_code.php';
require_once 'affiliate_link.php';
require_once 'product_category.php';
require_once 'product_tag.php';

// Create a new product
$product = new Product(1, 'Product 1', 'This is product 1', 10.99, 1);

// Create a new commission rate
$commission_rate = new CommissionRate(1, 1, 'percentage', 10);

// Create a new tracking code
$tracking_code = new TrackingCode(1, 1, 'TRACKING_CODE_1');

// Create a new affiliate link
$affiliate_link = new AffiliateLink(1, 1, 'https://example.com/affiliate-link');

// Create a new product category
$product_category = new ProductCategory(1, 'Category 1');

// Create a new product tag
$product_tag = new ProductTag(1, 'Tag 1');

// Display all products
$products = array();
$products[] = $product;

// Display all commission rates
$commission_rates = array();
$commission_rates[] = $commission_rate;

// Display all tracking codes
$tracking_codes = array();
$tracking_codes[] = $tracking_code;

// Display all affiliate links
$affiliate_links = array();
$affiliate_links[] = $affiliate_link;

// Display all product categories
$product_categories = array();
$product_categories[] = $product_category;

// Display all product tags
$product_tags = array();
$product_tags[] = $product_tag;

// HTML output
?>
<html>
<head>
    <title>Product Management System</title>
</head>
<body>
    <h1>Product Management System</h1>
    <h2>Products</h2>
    <ul>
        <?php foreach ($products as $product) {?>
            <li>
                <?php echo $product->getName();?> (<?php echo $product->getPrice();?>)
            </li>
        <?php }?>
    </ul>
    <h2>Commission Rates</h2>
    <ul>
        <?php foreach ($commission_rates as $commission_rate) {?>
            <li>
                <?php echo $commission_rate->getRateType();?> (<?php echo $commission_rate->getRateValue();?>)
            </li>
        <?php }?>
    </ul>
    <h2>Tracking Codes</h2>
    <ul>
        <?php foreach ($tracking_codes as $tracking_code) {?>
            <li>
                <?php echo $tracking_code->getCode();?>
            </li>
        <?php }?>
    </ul>
    <h2>Affiliate Links</h2>
    <ul>
        <?php foreach ($affiliate_links as $affiliate_link) {?>
            <li>
                <?php echo $affiliate_link->getLinkUrl();?>
            </li>
        <?php }?>
    </ul>
    <h2>Product Categories</h2>
    <ul>
        <?php foreach ($product_categories as $product_category) {?>
            <li>
                <?php echo $product_category->getName();?>
            </li>
        <?php }?>
    </ul>
    <h2>Product Tags</h2>
    <ul>
        <?php foreach ($product_tags as $product_tag) {?>
            <li>
                <?php echo $product_tag->getName();?>
            </li>
        <?php }?>
    </ul>
</body>
</html>