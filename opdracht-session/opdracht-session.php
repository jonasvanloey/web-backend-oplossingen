<?php
session_start();
if (isset($_POST['submit']))
{


}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="opdracht-sessions-pagina-02-adres.php" method="post">
    <p>username</p>
    <input type="text" name="username">
    <p>password</p>
    <input type="password" name="password">
    <input type="submit" name="submit" value="send">
    <p><?=  $_POST['username'] ?></p>

</form>
</body>
</html>
