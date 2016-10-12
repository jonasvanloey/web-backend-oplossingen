<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
<?php
$i = 0;
$getallen = array();
    
    while(i<=100)
{
        $getallen[]= $i ;
    ++$i;
}
$string = implode( ', ', $getallen );
    
    
    
    	$i = 0;

	$getallen2	=	array();

	while ( $i <= 100 )
	{
		if ( $i % 3 == 0 && $i > 40 && $i < 80 )
		{
			$getallen2[]	=	$i;
		}

		++$i;
	}

	$string2	=	implode( ', ', $getallen2 );
?>
        
    </head>
    <body class="web-backend-opdracht">
      
    </body>
</html>
