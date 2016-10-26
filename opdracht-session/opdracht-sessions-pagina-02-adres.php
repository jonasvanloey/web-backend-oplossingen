<?php
session_start();

var_dump( $_POST );
var_dump( $_SESSION );
//session vorige pagina doorgeven aan deze pagina
if ( isset( $_POST[ 'submit' ] ) )
{
    $_SESSION['registratie']['deel1']['mail']     =   $_POST[ 'mail' ];
    $_SESSION['registratie']['deel1']['username']    =   $_POST[ 'username' ];
}


$data['deel1']= $_SESSION['registratie']['deel1'];


$straat =( isset($_SESSION['registratie']['deel2']['straat']));
$nummer =( isset($_SESSION['registratie']['deel2']['nummer']));
$gemeente =( isset($_SESSION['registratie']['deel2']['gemeente']));
$postcode =( isset($_SESSION['registratie']['deel2']['postcode']));
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

<h1>registratiegegevens</h1>
<ul>
<?php foreach($data['deel1'] as $info => $value): ?>
<li><?= $info ?>: <?= $value ?></li>
<?php endforeach; ?>
</ul>

<h1>Deel 2: adres</h1>
<form action="opdracht-sessions-pagina-03-overzicht.php" method="post">
    <p>straat</p>
    <input type="straat" value="<?= $straat?>">
    <p>nummer</p>
    <input type="nummer" value="<?= $nummer?>">
    <p>gemeente</p>
    <input type="gemeente" value="<?= $gemeente?>">
    <p>postcode</p>
    <input type="postcode" value="<?= $postcode?>">
    <input type="submit" name="submit">


</form>
</body>
</html>
