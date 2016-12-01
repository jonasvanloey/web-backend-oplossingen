<?php
$message = false;
if (isset($_POST['submit']))
{
    try {
        $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');
        $insertquery = 'INSERT INTO brouwers (brnaam,adres,postcode,gemeente,omzet)
                          VALUES (:naam, :adres, :postcode, :gemeente, :omzet)';
        $brouwer = $db->prepare($insertquery);

        $brouwer->bindValue( ':naam', $_POST[ 'brnaam' ] );
        $brouwer->bindValue( ':adres', $_POST[ 'adres' ] );
        $brouwer->bindValue( ':postcode', $_POST[ 'postcode' ] );
        $brouwer->bindValue( ':gemeente', $_POST[ 'gemeente' ] );
        $brouwer->bindValue( ':omzet', $_POST[ 'omzet' ] );

        $add = $brouwer->execute();
        if ($add){
            $insertId =	$db->lastInsertId();
            $message['type'] = 'succes';
            $message['text'] = 'geslaagd '.$insertId;
        }
        else
        {
            $message['type'] = 'error';
            $message['text'] = 'fail';
        }

    } catch (PDOException $e) {
        $message['type'] = 'error';
        $message['text'] = 'er is iets fout gegaan.';

    }
}
?>
<!doctype html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        ul{
            list-style-type: none;
        }
        li{
            padding: 5px;
        }

    </style>
</head>
<body>
<?= $message['text']?>
<h1>voeg een brouwer toe</h1>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <ul>
        <li>brouwernaam</li>
        <li><input type="text" name="brnaam"></li>
        <li>adres</li>
        <li><input type="text" name="adres"></li>
        <li>postcode</li>
        <li><input type="text" name="postcode"></li>
        <li>gemeente</li>
        <li><input type="text" name="gemeente"></li>
        <li>omzet</li>
        <li><input type="text" name="omzet"></li>

    </ul>
    <input type="submit" value="Voeg toe" name="submit">


</form>

</body>
</html>
