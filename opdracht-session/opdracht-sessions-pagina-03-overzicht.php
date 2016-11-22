<?php
session_start();

var_dump( $_POST );
var_dump( '<br>' );
var_dump( $_SESSION );

if (isset($_POST['submit']))
{

    $_SESSION['registratie']['deel2']['straat']     =   $_POST[ 'straat' ];
    $_SESSION['registratie']['deel2']['nummer']    =   $_POST[ 'nummer' ];
    $_SESSION['registratie']['deel2']['gemeente']     =   $_POST[ 'gemeente' ];
    $_SESSION['registratie']['deel2']['postcode']    =   $_POST[ 'postcode' ];
}



$data['registratie']['deel1']= $_SESSION['registratie']['deel1'];
$data['registratie']['deel2']= $_SESSION['registratie']['deel2'];

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

<h1>overzicht</h1>
<ul>
    <?php foreach ( $data['registratie']['deel1'] as $key => $value ):?>
    <li>
        <?= $key ?>: <?= $value ?>
    </li>
    <?php endforeach ?>

</ul>

</body>
</html>
