<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
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

        .chart-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .chart-container h2 {
            margin-top: 0;
            font-size: 1.8rem;
            text-align: center;
            color: #333;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
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
    </style>
</head>
<body>
<div class="dashboard-container">
    <div class="table-container">
        <table>
            <tr>
                <th>Total Affiliates</th>
                <th>Total Referrals</th>
                <th>Total Revenue</th>
            </tr>
            <tr>
                <td><?php echo $total_affiliates;?></td>
                <td><?php echo $total_referrals;?></td>
                <td>$<?php echo number_format($total_revenue, 2);?></td>
            </tr>
        </table>
        <table>
            <tr>
                <th>Top-Performing Affiliates</th>
            </tr>
            <?php foreach ($top_affiliates as $affiliate) {?>
            <tr>
                <td><?php echo $affiliate['name'];?> ($<?php echo number_format($affiliate['revenue'], 2);?>)</td>
            </tr>
            <?php }?>
        </table>
    </div>
    <div class="chart-container">
        <h2>Campaign Performance</h2>
        <canvas id="campaign-performance-chart" width="400" height="200"></canvas>
    </div>
    <div class="button-container">
        <a href="index.php">Go to Home</a>
        <a href="manage_affiliates.php">Manage Affiliates</a>
        <a href="create_campaigns.php">Create Campaign</a>
        <a href="logout.php">Log Out</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart.js code to generate the chart
    const ctx = document.getElementById('campaign-performance-chart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($chart_labels);?>,
            datasets: [
                {
                    label: 'Revenue',
                    data: <?php echo json_encode($chart_revenue);?>,
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgba(255, 206, 86, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
</body>
</html>
