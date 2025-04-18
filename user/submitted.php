<?php
session_start();
$fullname = $_SESSION['fullname'] ?? '';
$feedbackData = $_SESSION['feedback_data'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Feedback Submitted</title>
  <style>
    body {
      background-image: url('images/feedback-bg.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .container {
      background: rgba(255, 255, 255, 0.3);
      backdrop-filter: blur(12px);
      border-radius: 15px;
      padding: 100px;
      text-align: center;
      box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.2);
      width: 90%;
      max-width: 550px;
    }

    .icon {
     margin-top:20px;
      font-size: 60px;
      color: #28a745;
      margin-bottom: 15px;
    }

    h2 {
      font-size: 28px;
      color: #333;
      margin-bottom: 10px;
    }

    p {
      font-size: 16px;
      color: #444;
      margin-bottom: 20px;
    }

    .primary {
      background-color: #1e00ff;
      color: white;
      border: none;
      padding: 12px 25px;
      font-size: 15px;
      font-weight: 600;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: 25px;
    }

    .primary:hover {
      background-color: #1500cc;
    }

    .receipt {
      background: rgba(255,255,255,0.6);
      border-radius: 10px;
      padding: 20px;
      text-align: left;
      margin-top: 20px;
    }

    .receipt h3 {
      margin-bottom: 10px;
      color: #222;
    }

    .receipt-item {
      font-size: 15px;
      margin-bottom: 8px;
      color: #333;
    }

    @media (max-width: 480px) {
      .container {
        padding: 25px;
      }
    }
    .grid-container {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 10px 20px;
}

  </style>
</head>
<body>

  <div class="container">
    <div class="icon">✅</div>
    <h2>Thank You<?php if ($fullname) echo ", $fullname"; ?>!</h2>
    <p>Your feedback has been submitted successfully.</p>

    <?php if (!empty($feedbackData)): ?>
    <div class="receipt">
  <h3 style="text-align:center;"> Feedback Summary:</h3>
  <div class="grid-container">
    <?php foreach ($feedbackData as $question => $answer): ?>
      <div class="receipt-item">
        <strong><?= ucfirst(str_replace('_', ' ', $question)) ?>:</strong> <?= htmlspecialchars($answer) ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>

    <?php endif; ?>

    <form action="PI.php" method="get">
      <button class="primary" type="submit">Back to Forms</button>
    </form>
  </div>

  <script>
    function showDetails() {
    document.getElementById("detailsContainer").style.display = "block";
}


  </script>

</body>
</html>
