        <?php 

$rijen = 10;
$kolommen = 10;


        
?>
   <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
			
			.oneven
			{
				background-color	:	lightgreen;
			}

		</style>

    </head>
    <body class="web-backend-opdracht">
      <table> 
         <?php  for($i=0;$i<$rijen;++$i): ?>
                   
             <tr>
             <?php for($j=0;$j<$kolommen;++$j): ?>
            <td class="<?= ( ( $i * $j ) % 2 > 0 ) ? 'oneven' : '' ?>"><?= $i * $j ?></td>
              <?php endfor ?>     
            </tr>
         <?php endfor ?>
         </table>
    </body>
</html>
