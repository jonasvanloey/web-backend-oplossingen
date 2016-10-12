<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php 
            $jaar = 2016;
            $uitkomst =" ";

        if ($jaar%4=0)
        {
            if ($jaar%100=0)
            {
                if ($jaar%400=0)
                {
                    $uitkomst = "dit is een schrikkeljaar";
                }
                else
                {
                    $uitkomst = "dit is geen schrikkeljaar";
                    
                }
            }
        }
        else
        {
            $uitkomst = "dit is geen schrikkeljaar";
        }
        
        
        
        
        
        
        
        ?>
    </head>
    <body class="web-backend-opdracht">
        
<?php echo $uitkomst ?>
    </body>
</html>
