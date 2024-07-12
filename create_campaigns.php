<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Campaign</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
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

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }

        input[type="text"], input[type="number"], textarea, select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            background-color: #f9f9f9;
        }

        textarea {
            resize: vertical;
        }

        button {
            padding: 10px;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
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
    <h1>Create Campaign</h1>
    <form action="submit_campaign.php" method="POST">
        <label for="campaign-name">Campaign Name</label>
        <input type="text" id="campaign-name" name="campaign_name" required>

        <label for="budget">Budget</label>
        <input type="number" id="budget" name="budget" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" rows="5" required></textarea>

        <label for="affiliates">Select Affiliates</label>
        <select id="affiliates" name="affiliates[]" multiple required>
            <?php
            // Assume you have an array of affiliates
            $affiliates = [
                ['id' => 1, 'name' => 'John Doe'],
                ['id' => 2, 'name' => 'Jane Smith'],
            ];

            foreach ($affiliates as $affiliate) {
                echo "<option value='{$affiliate['id']}'>{$affiliate['name']}</option>";
            }
            ?>
        </select>

        <button type="submit">Create Campaign</button>
    </form>
    <a href="business_dashboard.php" class="back-link">Back to Dashboard</a>
</div>
</body>
</html>
