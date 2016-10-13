<?php

/**
 * @param $getal1
 * @param $getal2
 */
function berekenSom($getal1, $getal2)
{
    $som = $getal1+$getal2;

    return $som;




}
function vermenigvuldig($getal1, $getal2)
{
    $prod = $getal1*$getal2;

    return $prod;




}

function iseven($getal1)
{
    if ($getal1%2==0)
    {
        $answ='true';
    }
    else
    {
        $answ ='false';
    }


    return $answ;
}





?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht functies</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht functies: deel 1</h1>

            <?php echo berekenSom(10,2) ?>
            <?php echo vermenigvuldig(10,2) ?>
            <?php echo iseven(2) ?>

        </section>

    </body>
</html>
