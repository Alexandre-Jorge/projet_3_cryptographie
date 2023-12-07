<?php
    require_once 'config.php';
    session_start();

    if (!isset($_SESSION['login'])) {
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-admin.css">
    <title>Admin</title>
</head>
<body>
    <div id="logout">
        <a href="logout.php">Logout</a>
    </div>
    <div id="inputs">
        <form action="" method="post" id="form" onsubmit="return check_insert()">
            <input type="text" name="uid" id="uid" placeholder="11:22:aa:bb" required>
            <input type="text" name="product_number" id="product_number" placeholder="Product number" required>
            <input type="text" name="pers_number" id="pers_number" placeholder="Person number" required>
            <div id="div-button">
                <button onclick="add()">Add</button>
                <button onclick="modify()">Modify</button>
            </div>
        </form>
    </div>
</body>
<script type="text/javascript" src="check.js"></script>
<script type="text/javascript" src="form.js"></script>
</html> 