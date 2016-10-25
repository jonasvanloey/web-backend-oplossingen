<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
        function bank($bedrag){
            $jaar = 1;
            for ($jaar;$jaar<=10;++$jaar){
                $nieuwbedrag = $bedrag *pow(1.08,$jaar);
                echo 'na '.$jaar.' jaar heeft Hans '.$nieuwbedrag.'euro <br>';
            }
        }
        ?>
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
            <?php bank(100000) ?>

        </section>

    </body>
</html>
