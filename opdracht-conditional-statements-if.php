<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht conditional statements</title>
  <?php 
      
     $getal = 2;
    $dag = 'willekeurige dag';

if ($getal == 1){
    $dag = 'maandag';
}
     if ($getal == 2){
         $dag = 'dinsdag';
}
if ($getal == 3){
    $dag = 'woensdag';
}
if ($getal == 4){
    $dag = 'donderdag';
}
if ($getal == 5){
    $dag = 'vrijdag';
}
if ($getal == 6){
    $dag = 'zaterdag';
}
if ($getal == 7){
    $dag = 'zondag';
}

      
       
        
         
    ?>
    </head>
    <body class="web-backend-opdracht">
       
       
       <?php echo $dag>
        
       

    </body>
</html>
