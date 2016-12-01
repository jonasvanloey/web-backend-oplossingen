<?php

var_dump( $_POST );
$message ='log je in';
    $password='banaan';
    $username ='frank';
if ( isset( $_POST ['submit'] ) )
{
    if ( $_POST['username'] == $username && $_POST['password'] == $password )
    {
        $message	=	'je bent ingelogd';
    }
    else
    {
        $message	=	'probeer opnieuw';
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
<?php echo $message ?>
<h1>log in</h1>
<h2>username</h2>

<form action="opdracht-post.php" method="POST">

    <input type="text" id="username" name="username">
    <h2>password</h2>
    <input type="password" id="password" name="password">

    <input type="submit" name="submit" value="verzend" >
</form>


</body>
</html>
