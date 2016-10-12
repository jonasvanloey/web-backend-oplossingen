<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht if else if</title> 
        <?php 
        $getal = 54;
        $uitkomst = " ";
        if ($getal<10)
        {
            $uitkomst = "kleiner dan 10";
        }
        elseif ($getal>10 && $getal<20)
        {
            $uitkomst = " tussen 10 en 20";
        }
        elseif ($getal>20 && $getal<30)
        {
            $uitkomst = " tussen 20 en 30";
        }
        elseif ($getal>30 && $getal<40)
        {
            $uitkomst = " tussen 30 en 40";
        }
        elseif ($getal>40 && $getal<50)
        {
            $uitkomst = " tussen 40 en 50";
        }
        elseif ($getal>50 && $getal<60)
        {
            $uitkomst = " tussen 50 en 60";
        }
        elseif ($getal>60 && $getal<70)
        {
            $uitkomst = " tussen 60 en 70";
        }
        elseif ($getal>70 && $getal<80)
        {
            $uitkomst = " tussen 70 en 80";
        }
        elseif ($getal>80 && $getal<90)
        {
            $uitkomst = " tussen 80 en 90";
        }
        else
        {
            $uitkomst = " tussen 90 en 100";
        }
        
        
        
        
        
        
        
        ?>
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht if else if: deel 1</h1>

            <ul>
                <li>Maak een getal met een waarde tussen 1-100</li>
                <li>Zorg ervoor dat het script kan zeggen tussen welke tientallen het getal ligt, bv 'Het getal ligt tussen 20 en 30'.</li>
                <li>Zorg er vervolgens voor dat de boodschap omgekeerd afgedrukt wordt, bv '03 ne 02 nessut tgil lateg teH'.</li>
            </ul>  
        
        </section>

    </body>
</html>
