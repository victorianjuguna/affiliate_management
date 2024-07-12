<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Affiliates</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9;
        }

        .button-container {
            text-align: center;
        }

        .button-container a {
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .button-container a:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: block;
            text-align: center;
            margin: 20px 0;
            color: #007BFF;
            text-decoration: none;
            font-size: 1rem;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Manage Affiliates</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Revenue</th>
            <th>Actions</th>
        </tr>
        <?php
        // Assume you have an array of affiliates
        $affiliates = [
            ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com', 'revenue' => 1500],
            ['id' => 2, 'name' => 'Jane Smith', 'email' => 'jane@example.com', 'revenue' => 2000],
        ];

        foreach ($affiliates as $affiliate) {
            echo "<tr>
                    <td>{$affiliate['id']}</td>
                    <td>{$affiliate['name']}</td>
                    <td>{$affiliate['email']}</td>
                    <td>$" . number_format($affiliate['revenue'], 2) . "</td>
                    <td><a href='edit-affiliate.php?id={$affiliate['id']}'>Edit</a> | <a href='delete-affiliate.php?id={$affiliate['id']}'>Delete</a></td>
                  </tr>";
        }
        ?>
    </table>
    <div class="button-container">
        <a href="add-affiliate.php">Add New Affiliate</a>
    </div>
    <a href="business_dashboard.php" class="back-link">Back to Dashboard</a>
</div>
</body>
</html>
