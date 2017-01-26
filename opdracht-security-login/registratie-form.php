<?php
session_start();

$mail = '';
$paswoord = '';
$error ='';
$exists='';
if ($_SESSION['registratie'])
{
    $mail=$_SESSION['registratie']['mail'];
    $paswoord=$_SESSION['registratie']['paswoord'];
    $error = $_SESSION['registratie']['notification']['notmail'];
    $exists = $_SESSION['registratie']['notification']['exists'];

}

var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Registreren</h1>
<form action="registratie-process.php" method="POST" >
    <p>e-mail</p>
    <input type="text" name="mail" value="mail">
    <p>paswoord</p>
    <input type="password" name="paswoord" value="paswoord">
    <input type="submit" name="genereer"  value="genereer een paswoord">
    <input type="submit" name="registreer" value="registreer">

</form>
<p><?= $paswoord?></p>

</body>
</html>