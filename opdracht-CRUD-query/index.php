<?php
$message ='';
$db = new mysqli('localhost','root','','bieren');
if($db->connect_errno>0)
{
    $message = 'kan geen connectie maken'.$db->connect_error;
}
else
{
    $result = $db->query('SELECT b.*, br.* from bieren as b 
JOIN brouwers as br 
ON(b.brouwernr = br.brouwernr)
where b.naam LIKE "du%" AND br.brnaam LIKE "%a%"');

    $fetchAssoc = array();

    while ($row = $result->fetch_assoc())
    {
        $fetchAssoc[]=$row;
    }
}

$db->close();
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
<table>
    <thead>

    <td>biernr(PK)</td>
    <td>naam</td>
    <td>brouwernr</td>
    <td>soortnr</td>
    <td>alcohol</td>
    <td>brnaam</td>
    <td>adres</td>
    <td>postcode</td>
    <td>gemeente</td>
    <td>omzet</td>
    </thead>
    <tbody>
    <?php foreach ($fetchAssoc as $row): ?>
        <tr>
            <td><?= $row['biernr']?></td>
            <td><?= $row['naam']?></td>
            <td><?= $row['brouwernr']?></td>
            <td><?= $row['soortnr']?></td>
            <td><?= $row['alcohol']?></td>
            <td><?= $row['brnaam']?></td>
            <td><?= $row['adres']?></td>
            <td><?= $row['postcode']?></td>
            <td><?= $row['gemeente']?></td>
            <td><?= $row['omzet']?></td>
        </tr>

    <?php endforeach ?>

    </tbody>
</table>

</body>
</html>
