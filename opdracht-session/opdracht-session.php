<?php
session_start();
if (isset($_POST['username']))
{


}
var_dump( $_SESSION);
$username = (isset( $_SESSION['registratie']['deel1']['username']));//? $_SESSION[ 'registratie' ][ 'deel1' ][ 'username'] : '';

//? $_SESSION[ 'registrationData' ][ 'deel1' ][ 'email'] : '';  ???

$mail =(isset( $_SESSION['registratie']['deel1']['mail']));//? $_SESSION[ 'registratie' ][ 'deel1' ][ 'mail'] : '';
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

<form action="opdracht-sessions-pagina-02-adres.php" method="POST">
    <p>username</p>
    <input type="text" name="username" value="<?= $username ?>">
    <p>mail</p>
    <input type="text" name="mail" value="<?= $mail ?>">

    <!--  ( isset( $_GET['focus'] ) && $_GET['focus'] == "nickname" ) ? 'autofocus' : '' enkel om focus op textvak te zetten?? -->

    <input type="submit" name="submit">


</form>
</body>
</html>
