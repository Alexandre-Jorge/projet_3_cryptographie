<?php
    require_once 'config.php';
    session_start();

    if (isset($_POST['login']) && isset($_POST['password'])) {
        $login = $_POST['login'];
        $password = hash('sha256', $_POST['password']);

        $sql = 'SELECT * FROM admin WHERE login = :login AND password = :password';
        $stmt = $db->prepare($sql);
        $stmt->execute(['login' => $login, 'password' => $password]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($res) {
            $_SESSION['login'] = $login;
            header('Location: admin.php');
        } else {
            echo 'Invalid login or password';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style-login.css">
    <title>Login</title>
</head>
<body>
    <div id="inputs">
        <form action="login.php" method="post">
            <input type="text" name="login" id="login" placeholder="Login" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>