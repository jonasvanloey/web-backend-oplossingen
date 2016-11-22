<?php
function __autoload( $className )
{
require_once 'classes/'.$className .'.php' ;
	}

	$kermit = new animal('kermit','male',100);
    $Dikkie = new animal('dikkie','male',90);
    $Flipper = new animal('flipper','female',80);
    $simba = new lion('simba','male',100,'congo lion');
    $scar = new  lion('scar','male',100,'kenia lion');
    $zeke = new zebra('zeke','male',100,'quagga');
    $zana = new zebra('zana','female',100,'selous')
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
<?= $Dikkie->getName()?>
</body>
</html>
