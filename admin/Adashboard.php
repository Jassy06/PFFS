

<?php
    session_start();

    $fullname = $_SESSION['fullname'] ?? '';
    $role = $_SESSION['role'] ?? '';


    if ($role !== 'admin') {
        header("Location: user/PI.php");
        exit();
    }
    include("../connection.php"); 



    $sql = "SELECT id, fullname, created_at FROM feedback ORDER BY created_at DESC";
    $result = $con->query($sql);
    $totalFeedback = $result->num_rows; // ✅ Define this to fix the warning
    

    // Total feedback already fetched as $totalFeedback

    // Get most recent submission
    $latestSql = "SELECT fullname, created_at FROM feedback ORDER BY created_at DESC LIMIT 1";
    $latestResult = $con->query($latestSql);
    $latestFeedback = $latestResult->fetch_assoc();

    // Get top submitter
    $topSubmitterSql = "SELECT fullname, COUNT(*) as total FROM feedback GROUP BY fullname ORDER BY total DESC LIMIT 1";
    $topSubmitterResult = $con->query($topSubmitterSql);
    $topSubmitter = $topSubmitterResult->fetch_assoc();

    // Feedback per day for the past 7 days
    $trendSql = "
        SELECT DATE(created_at) as date, COUNT(*) as total 
        FROM feedback 
        WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)
        GROUP BY DATE(created_at) 
        ORDER BY date ASC";
    $trendResult = $con->query($trendSql);
    $feedbackTrend = [];
    while ($row = $trendResult->fetch_assoc()) {
        $feedbackTrend[$row['date']] = $row['total'];
    }

    // Fill in missing days with 0
    for ($i = 6; $i >= 0; $i--) {
        $date = date('Y-m-d', strtotime("-$i days"));
        if (!isset($feedbackTrend[$date])) {
            $feedbackTrend[$date] = 0;
        }
    }

    // Map response strings to numerical values
$responseMap = [
    'Strongly Agree' => 4,
    'Agree' => 3,
    'Disagree' => 2,
    'Strongly Disagree' => 1
];

function calculateFactorAverage($con, $questions) {
    global $responseMap;
    $columns = implode(",", $questions);
    $sql = "SELECT $columns FROM feedback";
    $result = $con->query($sql);

    $total = 0;
    $count = 0;

    while ($row = $result->fetch_assoc()) {
        foreach ($questions as $q) {
            if (isset($responseMap[$row[$q]])) {
                $total += $responseMap[$row[$q]];
                $count++;
            }
        }
    }

    return $count > 0 ? round($total / $count, 2) : 0;
}

$schoolEnvAvg = calculateFactorAverage($con, ['q1','q2','q3','q4','q5']);
$servicesAvg = calculateFactorAverage($con, ['q6','q7','q8','q9','q10']);
$otherFactorsAvg = calculateFactorAverage($con, ['q11','q12','q13','q14','q15']);


    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document Management</title>
        <link rel="stylesheet" href="Adocument.css">
        <title>Admin Document</title>
        <link rel="stylesheet" href="Adocument.png">
    </head>

    <style>
        body {
        display: flex;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .sidebar {
        width: 200px;
        background-color: #002f6c;
        padding: 20px;
        height: 100vh;
        color: white;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
    }

    .sidebar ul li {
        margin: 15px 0;
    }

    .sidebar ul li a {
        text-decoration: none;
        font-weight: bold;
        color: rgb(255, 255, 255);
    }

    .sidebar ul li a.active {
        color: blue;
    }

    .content {
        flex-grow: 1;
        padding: 20px;
        
    }

    #search {
        width: 80%;
        padding: 8px;
        margin-bottom: 10px;
    }

    table {
        width: 90%;
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid rgb(255, 255, 255);
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    button {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 18px;
    }
    body {
        background-image: url('../images/Adocument.png'); 
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat; 
        height: 100vh; 
        margin: 0;
        font-family: Arial, sans-serif;
        color: black;
    }
    .Adocument{
        background-image: url('../images/Adocument.png');
    }
    caption {
        font-size: 22px; 
        font-weight: bold;
        text-transform: uppercase; 
        padding: 10px 0; 
        text-align: center;
    }
    .submitted-title {
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px; 
    }
    .logout {
        margin-top: auto; 
        color: red;
        font-weight: bold;
    }


    #save {
        margin-top: 10px;
        padding: 10px 20px;
        border: 1px solid white;
        cursor: pointer;
    }


    button {
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        border: none;
        border-radius: 5px;
        transition: all 0.3s ease;
    }


    .view {
        background-color: #4CAF50; 
        color: white;
    }

    .view:hover {
        background-color: #45a049; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }


    .delete {
        background-color: #f44336; 
        color: white;
    }

    .delete:hover {
        background-color: #e53935; 
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }


    button:active {
        transform: scale(0.98); 
    }

    td button {
        margin: 5px;
    }


    table tr {
        margin-bottom: 10px;
    }

    .cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 20px;
}

.card {
    background-color: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    width: 100%;
    box-sizing: border-box;
}

.stat p {
    font-size: 28px;
    margin: 10px 0;
    font-weight: bold;
    color: #002f6c;
}

.stat small {
    color: #777;
}

.chart-container, .table-card {
    background-color: white;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    overflow-x: auto;
}

.table-card table {
    width: 100%;
    border-collapse: collapse;
    color: #333;
}

.table-card th, .table-card td {
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

.table-card tr:hover {
    background-color: #f9f9f9;
}

@media (max-width: 768px) {
    .cards {
        grid-template-columns: 1fr;
    }

    .chart-container,
    .table-card {
        padding: 15px;
    }
}


    </style>

    <body>
        <div class="sidebar">
            <ul>
                <h2>MENU</h2>
                <li><a href="Ahome.php">HOME</a></li>
                <li><a href="Adashboard.php" class="active">DASHBOARD</a></li>
                <li><a href="Adocument.php" >DOCUMENT</a></li>        
                <li><a href="logout.php" id="logout">LOG OUT</a></li>
            </ul>
        </div>

        <div class="content">
    <h2 style="margin-bottom: 20px; color: white;">Feedback Analytics</h2>

    <div class="cards">
        <div class="card stat">
            <h3>Total Feedback</h3>
            <p><?= $totalFeedback ?></p>
        </div>
        <div class="card stat">
            <h3>Latest Submission</h3>
            <p><?= $latestFeedback['fullname'] ?></p>
            <small><?= $latestFeedback['created_at'] ?></small>
        </div>
        <div class="card stat">
            <h3>Top Submitter</h3>
            <p><?= $topSubmitter['fullname'] ?></p>
            <small><?= $topSubmitter['total'] ?> submissions</small>
        </div>
        <div class="card stat">
    <h3>Submissions Over The Last 7 Days</h3>
    <canvas id="lineChart" height="200"></canvas>
</div>

<!-- <div class="card stat">
    <h3>📊 Factor Averages</h3>
    <canvas id="barChart" height="200"></canvas>
</div> -->

        
    </div>

  

    <div class="card table-card">
    <table>
        <caption>Average Feedback Per Factor</caption>
        <thead>
            <tr>
                <th>Factor</th>
                <th>Average Score</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>School Environment</td>
                <td><?= $schoolEnvAvg ?></td>
            </tr>
            <tr>
                <td>Services</td>
                <td><?= $servicesAvg ?></td>
            </tr>
            <tr>
                <td>Other Factors</td>
                <td><?= $otherFactorsAvg ?></td>
            </tr>
        </tbody>
    </table>
</div>


<!-- 
        <canvas id="trendChart" width="600" height="300"></canvas> -->


        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Line Chart: Feedback Submissions Over Last 7 Days
const lineCtx = document.getElementById('lineChart').getContext('2d');
const lineChart = new Chart(lineCtx, {
    type: 'line',
    data: {
        labels: <?= json_encode(array_keys($feedbackTrend)) ?>,
        datasets: [{
            label: 'Feedback Submissions',
            data: <?= json_encode(array_values($feedbackTrend)) ?>,
            borderColor: '#4CAF50',
            backgroundColor: 'rgba(76, 175, 80, 0.2)',
            borderWidth: 2,
            fill: true,
            tension: 0.2
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});

// Bar Chart: Factor Averages
const barCtx = document.getElementById('barChart').getContext('2d');
const barChart = new Chart(barCtx, {
    type: 'bar',
    data: {
        labels: ['School Environment', 'Services', 'Other Factors'],
        datasets: [{
            label: 'Average Score',
            data: [<?= $schoolEnvAvg ?>, <?= $servicesAvg ?>, <?= $otherFactorsAvg ?>],
            backgroundColor: ['#4CAF50', '#2196F3', '#FFC107'],
            borderColor: ['#388E3C', '#1976D2', '#FFA000'],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                max: 4,
                ticks: {
                    stepSize: 1
                },
                title: {
                    display: true,
                    text: 'Score (1-4)'
                }
            }
        }
    }
});
</script>

    </body>
    </html>