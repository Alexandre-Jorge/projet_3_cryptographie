<?php
    require_once 'config.php';
    session_start();

    if (!isset($_SESSION['login'])) {
        header('Location: login.php');
    }

    if (isset($_POST['uid']) && isset($_POST['product_number']) && isset($_POST['pers_number'])) {
        $uid = $_POST['uid'];
        $product_number = $_POST['product_number'];
        $pers_number = $_POST['pers_number'];
        $ok = true;

        //check that uid match the regex "^[0-9a-fA-F]{2}(:[0-9a-fA-F]{2}){3}$"
        if (!preg_match('/^[0-9a-fA-F]{2}(:[0-9a-fA-F]{2}){3}$/', $uid)) {
            $ok = false;
        }
        //check that product_number match the regex "^[0-9]{14}$"
        if (!preg_match('/^[0-9]{14}$/', $product_number)) {
            $ok = false;
        }
        //check that pers_number match the regex "^[1-2]{1} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{3} [0-9]{3}$"
        if (!preg_match('/^[1-2]{1} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{3} [0-9]{3}$/', $pers_number)) {
            $ok = false;
        }

        $hash = hash('sha256', $uid.$product_number.$pers_number);

        if($ok){
            $sql = 'INSERT INTO certif (uid, hash) VALUES (:uid, :hash)';
            $stmt = $db->prepare($sql);
            $stmt->execute(['uid' => $uid, 'hash' => $hash]);
?>

            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="style-add-certif.css">
                <title>Document</title>
            </head>
            <body>
            <div id="logout">
                    <a href="logout.php">Logout</a>
                </div>
                <div id="output">
                    <h1>New certification added successfully</h1>
                    <h3>Here is the hash : </h3>
                    <p><?php echo $hash ?></p>
                    <a href="admin.php">Add new certification</a>
                </div>
            </body>
            </html>
<?php
        }
        else{
?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=, initial-scale=1.0">
                <link rel="stylesheet" href="style-add-certif.css">
                <title>Document</title>
            </head>
            <body>
                <div id="logout">
                    <a href="logout.php">Logout</a>
                </div>
                <div id="output">
                    <h1>Invalid input</h1>
                    <a href="admin.php">Add new certification</a>
                </div>
            </body>
            </html>
<?php
        }
    }
?>