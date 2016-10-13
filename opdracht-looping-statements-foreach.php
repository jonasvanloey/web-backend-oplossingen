
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
    $text = file_get_contents( 'text-file.txt');


$array = str_split($text);


rsort($array);
	$arrayomgekeerd = array_reverse( $array );

	$array2 = array();

	foreach($arrayomgekeerd as $value)
	{
		if ( isset ( $array2[ $value ] ) )
		{
			++$array2[$value];

		}
		else
		{
			$array2[ $value ] = 1;
		}

	}
    ?>
    </head>
    <body class="web-backend-opdracht">
       <?php var_dump($array2) ?>

    </body>
</html>
