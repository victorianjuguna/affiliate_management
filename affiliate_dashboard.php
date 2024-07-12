<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affiliate Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            align-items: flex-start;
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .metric-table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .metric-table th,
        .metric-table td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .metric-table th {
            background-color: #f4f4f4;
            color: #333;
            font-weight: bold;
            border-right: 1px solid #ddd;
        }

        .metric-table td {
            background-color: #fff;
        }

        .metric-table tr:last-child td {
            border-bottom: none;
        }

        .chart-container {
            width: 100%;
            max-width: 100%;
            margin: 20px auto;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .chart-container h2 {
            margin-top: 0;
            font-size: 1.8rem;
            text-align: center;
            color: #333;
            padding: 20px;
        }

        .earnings-chart {
            max-width: 100%;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="dashboard-container">
    <table class="metric-table">
        <tr>
            <th>Total Referrals</th>
            <th>Total Conversions</th>
            <th>Total Earnings</th>
        </tr>
        <tr>
            <td><?php echo $total_referrals;?></td>
            <td><?php echo $total_conversions;?></td>
            <td>$<?php echo number_format($total_earnings, 2);?></td>
        </tr>
        <tr>
            <th colspan="3">Top Performing Campaigns</th>
        </tr>
        <?php foreach ($top_campaigns as $campaign) {?>
        <tr>
            <td colspan="3"><?php echo $campaign['name'];?> ($<?php echo number_format($campaign['earnings'], 2);?>)</td>
        </tr>
        <?php }?>
        <tr>
            <td colspan="3">
                <div class="chart-container">
                    <h2>Earnings Over Time</h2>
                    <canvas class="earnings-chart" id="earnings-chart" width="600" height="300"></canvas>
                </div>
            </td>
        </tr>
    </table>

    <a href="referral-link.php">Get Referral Link</a>
    <a href="campaign-materials.php">Get Campaign Materials</a>
    <a href="logout.php">Log Out</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart.js code to generate the chart
    const ctx = document.getElementById('earnings-chart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php echo json_encode($chart_labels);?>,
            datasets: [
                {
                    label: 'Earnings',
                    data: <?php echo json_encode($chart_earnings);?>,
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
