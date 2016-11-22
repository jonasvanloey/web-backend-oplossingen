<?php
function __autoload($classname)
{
    require_once 'classes/'.$classname.'.php';
}
$percentage = new percent(100,100);
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
    <tr>
        <td>absoluut</td>
        <td><?= $percentage->absolute ?></td>
    </tr>
    <tr>
        <td>relatief</td>
        <td><?= $percentage->relative ?></td>
    </tr>
    <tr>
        <td>geheel getal</td>
        <td><?= $percentage->hundred?></td>
    </tr>
    <tr>
        <td>nominaalt</td>
        <td><?= $percentage->nominal ?></td>
    </tr>
</table>

</body>
</html>
