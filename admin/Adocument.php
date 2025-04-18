

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

$sort = $_GET['sort'] ?? 'date'; 

if ($sort === 'name') {
    $sql = "SELECT * FROM feedback ORDER BY fullname ASC";
} else {
    $sql = "SELECT * FROM feedback ORDER BY created_at DESC";
}

$result = $con->query($sql);


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
    background-image: url('../images/Adocument.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    height: 100vh;
    width: 100%;
}

.sidebar {
    width: 200px;
    background-color: #002f6c;
    padding: 20px;
    height: 100vh;
    color: white;
    position: fixed; 
    top: 0;
    left: 0;
    overflow-y: auto;
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
    margin-left: 360px; 
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
</style>

<body>
    <div class="sidebar">
    <ul>
                <h2>MENU</h2>
                <li><a href="Ahome.php">HOME</a></li>
                <li><a href="Adashboard.php" >DASHBOARD</a></li>
                <li><a href="Adocument.php"class="active" >DOCUMENT</a></li>        
                <li><a href="logout.php" id="logout">LOG OUT</a></li>
            </ul>
    </div>

    <div class="content">
        <h2 class="submitted-title">SUBMITTED FEEDBACK</h2>
        <div class="search-container">
            <input type="text" id="search" placeholder="Search">
            <button class="search-btn"><i class="fa fa-search"></i></button>
        </div>

       <form method="GET" style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px; background-color: #ffffffcc; padding: 10px 15px; border-radius: 8px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); width: fit-content;">
    <label for="sort" style="font-weight: bold; font-size: 16px; color: #002f6c;">Sort by:</label>
    <select name="sort" id="sort" onchange="this.form.submit()" style="padding: 6px 12px; font-size: 15px; border-radius: 5px; border: 1px solid #ccc; background-color: white; cursor: pointer;">
        <option value="date" <?= ($sort === 'date') ? 'selected' : '' ?>>Newest Date</option>
        <option value="name" <?= ($sort === 'name') ? 'selected' : '' ?>>Alphabetical (Name)</option>
    </select>
</form>



        <table>
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>DATE</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody id="documentTableBody">
<?php if ($result->num_rows > 0): ?>
    <?php

while ($row = $result->fetch_assoc()):

    ?>
        <tr 
            data-id="<?= $row['id'] ?>"
            data-fullname="<?= htmlspecialchars($row['fullname']) ?>"
            data-created="<?= $row['created_at'] ?>"
            <?php for ($i = 1; $i <= 15; $i++): ?>
                data-q<?= $i ?>="<?= htmlspecialchars($row['q' . $i]) ?>"
            <?php endfor; ?>
        >
            <td><?= htmlspecialchars($row['fullname']) ?></td>
            <td><?= $row['created_at'] ?></td>
            <td>
                <button class="view" onclick="showModal(this)">View</button>
                <a href="delete_feedback.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this?');"><button class="delete">Delete</button></a>
            </td>
        </tr>
    <?php endwhile; ?>
<?php else: ?>
    <tr><td colspan="3">No feedback submitted.</td></tr>
<?php endif; ?>
</tbody>

        </table>

    
    </div>

<div id="feedbackModal" style=" color:black; display:none; position:fixed; top:0; left:0; right:0; bottom:0; background:rgba(0,0,0,0.6); justify-content:center; align-items:center; z-index:1000;">
    <div style="background:white; padding:20px; width:70%; max-height:90vh; overflow-y:auto; border-radius:10px;">
        <h2 id="modalFullname"></h2>
        <p><strong>Submitted At:</strong> <span id="modalCreatedAt"></span></p>
        <table border="1" width="100%" cellpadding="10" cellspacing="0">
            <tbody id="modalQuestions"></tbody>
        </table>
        <br>
        <button onclick="closeModal()" style="padding:10px 20px;">Close</button>
    </div>
</div>


    <script>
function showModal(button) {
    const row = button.closest('tr');

    const fullname = row.dataset.fullname;
    const created = row.dataset.created;

    document.getElementById('modalFullname').textContent = fullname;
    document.getElementById('modalCreatedAt').textContent = created;

    const questionsTable = document.getElementById('modalQuestions');
    questionsTable.innerHTML = ''; 

    for (let i = 1; i <= 15; i++) {
        const question = row.dataset['q' + i];
        const tr = document.createElement('tr');
        tr.innerHTML = `<th>Q${i}</th><td>${question}</td>`;
        questionsTable.appendChild(tr);
    }

    document.getElementById('feedbackModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('feedbackModal').style.display = 'none';
}

document.getElementById('search').addEventListener('input', function() {
    const searchTerm = this.value.toLowerCase(); 
    const rows = document.querySelectorAll('#documentTableBody tr'); 

    rows.forEach(row => {
        const fullname = row.dataset.fullname.toLowerCase(); 
        const created = row.dataset.created.toLowerCase(); 

       
        if (fullname.includes(searchTerm) || created.includes(searchTerm)) {
            row.style.display = ''; 
        } else {
            row.style.display = 'none'; 
        }
    });
});
</script>

</body>
</html>