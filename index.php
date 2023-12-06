<?php
    require_once 'config.php';

    if (isset($_POST['uid']) && isset($_POST['hash'])) {
        $uid = $_POST['uid'];
        $hash = $_POST['hash'];

        $sql = 'SELECT * FROM certif WHERE uid = :uid AND hash = :hash';
        $stmt = $db->prepare($sql);
        $stmt->execute(['uid' => $uid, 'hash' => $hash]);
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($res) {
            echo 'Product is authentic';
        } else {
            echo 'Product is not authentic';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Jack Sparrhum</h1>
    <h2>Verify prodcut autenticity</h2>
    <form action="index.php" method="post">
        <input type="text" name="uid" placeholder="11:22:aa:bb">
        <input type="text" name="hash" placeholder="SHA-256">
        <input type="submit" value="Verify">
    </form>
</body>
</html>