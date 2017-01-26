<?php
session_start();

function __autoload( $classname )
{
    require_once( $classname . '.php' );
}
$connection =  new PDO( 'mysql:host=localhost;dbname=opdracht-security-login', 'root', '' );
if(validation::authenticate($connection))
{
    header('location: dashboard.php');
}
else
{
    $message	= "de inloggegevens waren foutief";

    if ( isset( $_SESSION[ 'login' ] ) )
    {
        $email		=	$_SESSION[ 'login' ][ 'email' ];
        $password	=	$_SESSION[ 'login' ][ 'password' ];
        $message = $_SESSION['message']['text'];
    }
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
<h1>Inloggen</h1>
<form action="loginconfirm.php" method="post">
    <ul>
        <li>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?= $email ?>">
        </li>

        <li>
            <label for="password">Paswoord</label>
            <input type="password" name="password" id="password" value="<?= $password ?>">
        </li>
    </ul>

    <input type="submit" name="submit" value="log in">

</form>
<?= $message ?>

<p>Nog geen login? <a href="registratie-form.php">Registreer dan hier.</a></p>
</body>
</html>
