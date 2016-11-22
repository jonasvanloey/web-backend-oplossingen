<?php

if (isset($_GET['logout']))
{
    setcookie('ingelogd', '',time()-1000);
    header('location: opdracht-cookies-login.php'); //??

}
$bestand = file_get_contents('text.txt');
$bestandarray = explode(',',$bestand);

$login_is_juist = false;
$message = ' ';

if (!isset($_COOKIE['ingelogd']))
{
    if (isset($_POST['submit']))
    {
     if ($_POST['username'] == $bestandarray[0]&&$_POST['password']== $bestandarray[1])
        {
            setcookie('ingelogd',true,time()+3600);//minuten??
            $message = 'u bent succesvol ingelogd';
            $login_is_juist=true;

        }
        else
        {
            $message ='u bent niet ingelogd';
        }
    }

}
else
{
    $message = 'u bent succesvol ingelogd';
    $login_is_juist=true;
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
<?php if(!$login_is_juist): ?>

<h1>inloggen</h1>
<form action="opdracht-cookies-login.php" method="post">
    <p>gebruikersnaam</p>
    <input type="text" name="username">
    <p>paswoord</p>
    <input type="password" name="password">
    <input type="submit" name="submit">
</form>

<?php else: ?>
    <h1>Dashboard</h1>
    <?= $message ?>
    <a href="opdracht-cookies-login.php?logout=true">uitloggen</a>


<?php endif ?>

</body>
</html>