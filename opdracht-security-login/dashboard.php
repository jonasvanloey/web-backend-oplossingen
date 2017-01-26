<?php
$istrue = false;

if(isset($_COOKIE['authenticated']))
{
    $data = explode(',',$_COOKIE['authenticated']);
    $mail = $data[0];
    $saltedmail = $data[1];
    $db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '');

    $querystring = 'SELECT salt from users where email = :email';
    $query = $db->prepare($querystring);
    $query->bindValue(':email',$mail);
    $query->execute();

    if ($query->columnCount()==1)
    {
        $gotsalt = array();
        $row = $query->fetch(PDO::FETCH_ASSOC);

        $salt = $row['salt'];
        $newlySaltedEmail 	= hash( 'sha512' , $row['salt'] . $mail );
        if ($newlySaltedEmail==$saltedmail)
        {
            $istrue=true;
        }
        else
        {

        }
    }


}
else
{
    $_SESSION['login']['message']='u moet eerst inloggen';
    header('location: login.php');
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
<h1>DASHBOARD</h1>
<p><?= $mail ?></p>
<p><?= $saltedmail ?></p>
<?php foreach ($gotsalt as $salt): ?>
<p><?= $salt['salt'] ?></p>
<?php endforeach; ?>
<?php if ($istrue):?>
<a href="logout.php">uitloggen</a>
<?php endif ?>

</body>
</html>
