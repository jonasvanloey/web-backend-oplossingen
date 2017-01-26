<?php
$message= false;
try
{
    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', '');
    $querystring = 'SELECT * from brouwers';
    $query = $db->prepare($querystring);
    $query->execute();

    $kolomnaam = array();
    for ($key = 0;$key < $query->columnCount();++$key)
    {
        $kolomnaam[] = $query->getColumnMeta($key)['name'];
    }

    $info = array();
    while ($row = $query->fetch(PDO::FETCH_ASSOC))
    {
        $info[] = $row;
    }
    if (isset($_POST['delete'])) {

        $deletestring = 'DELETE from brouwers WHERE brouwernr = :brouwernr';
        $delete = $db->prepare($deletestring);

        $delete->bindValue(':brouwernr', $_POST['delete']);

        $isdeleted = $delete->execute();
        if ($isdeleted) {
            $message['type'] = 'succes';
            $message['text'] = 'verwijdert';
            var_dump($_POST['delete']);

        } else {
            $message['type'] = 'error';
            $message['text'] = 'er is iets fout.';
        }

    }
    $pushededit = false;
    if (isset($_POST['edit']))
    {
        $pushededit = true;

        $getbrouwernaam = "SELECT brnaam, brouwernr FROM brouwers WHERE brouwernr = :brouwernr";
        $name = $db->prepare($getbrouwernaam);

        $name->bindValue(":brouwernr",$_POST['edit']);
        $name->execute();
        $brgegevens = array();
        while ($row = $name->fetch(PDO::FETCH_ASSOC))
        {
            $brgegevens[] = $row;
        }
    }

}
catch(PDOException $e)
{
    $message['type'] = 'error';
    $message['text'] = 'er is iets fout gelopen.';
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
<h1>gfjlvdfj</h1>
<?php if ($pushededit): ?>
    <?php foreach ($brgegevens as $brg): ?>
        <h1>Brouwer <?= $brg['brnaam'] ?> wijzigen</h1>
    <?php endforeach?>
<?php endif; ?>
<p><?= $message['text'] ?></p>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
    <table>
        <thead>
        <tr>
            <th>#</th>
            <?php foreach($kolomnaam as $header ):?>
                <th><?= $header ?></th>
            <?php endforeach ?>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($info as $waardes =>$info): ?>
            <tr>
                <td><?php ++$waardes ?></td>
                <?php foreach ($info as $l): ?>
                    <td><?= $l ?></td>
                <?php endforeach ?>

                <td><button type="submit" name="delete" value="<?= $info['brouwernr'] ?>"><img src="images/icon-delete.png" alt="delete"></button></td>
                <td><button type="submit" name="edit" value="<?= $info['brouwernr'] ?>"><img src="images/icon-edit.png" alt="edit"></button></td>
            </tr>
        <?php endforeach ?>

        </tbody>
    </table>
</form>

</body>
</html>