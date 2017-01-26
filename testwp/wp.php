<?php
function checktime()
{
    $timestamp = mktime();
    $timenow = strftime('%H', $timestamp);

    return $timenow;
}
function getopening(){

    $opening="";
    $hour = checktime();
    if ($hour <11)
    {
        $opening = "goedemorgend";
    }
    elseif ($hour > 17) {
        $opening = "goedenavond";
    }
    else {
        $opening = "goedenmiddag";
    }
    return $opening;
}

function greeter()
{
    $text ="";
    if (!isset($_COOKIE['visited'])){
        setcookie ('visited', 'yes', time() + 3600);
        $text ="welkom op deze website";


    }
    else
    {
        $text ="welkom terug";

    }
    $openingtext = getopening();
    $sessiontext = $text;
    $greetertext = $openingtext .", " .$sessiontext;
    return $greetertext;
}
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
<p><?php echo greeter() ?></p>

</body>
</html>
