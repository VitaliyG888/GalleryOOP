<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $data = file('userdata.txt');
    foreach ($data as $d) {
        $us = explode(':', trim($d));
        if ($us[0] === $_POST['login'] && $us[1] === $_POST['password']) {
            $_SESSION['auth_user'] = true;
            header('Location: index.php');
        }
    }
}
?>

<form method="post">
    <input type="text" name="login" placeholder="login"><br/>
    <input type="password" name="password" placeholder="password"><br/>
    <button>Login</button>
</form>
