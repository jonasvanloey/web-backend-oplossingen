<?php
session_start();
$code = '';
$message = false;
$isValid = false;
try{
    if (isset( $_POST['submit']) ){

            if((controle($_POST['korting']))&&(controle2($_POST['submit'])))
            {
                $isValid=true;
                $code = $_POST['korting'];
            }
    }

}
catch (Exception $e)
{
    $message['type'] = 'error';
    $messageCode = $e->getMessage();
    $createMessage = false;

    switch ($messageCode)
    {
        case 'SUBMIT-ERROR':
            $message['text'] = 'Er werd met het formulier geknoeid' ;
           $createMessage=true;
        case 'VALIDATION-CODE-LENGTH':
            $message['text'] = 'De kortingscode heeft niet de juiste lengte' ;
            $createMessage=true;

    }
    if($createMessage)
    {
        logToFile($message['text'],$message['type']);
        createMessage($message['text']);
    }


}
function createMessage($message){}
function logToFile($message,$type){
    $date = '[' . date( 'H:i:s', time() ).']';
    $errortxt = $message;
    $errortype = $type;

    $errorlog = $date.' - type:['.$errortype.'] '.$errortxt."\r";
    file_put_contents('log.txt',$errorlog, FILE_APPEND);
}
function controle2($code){
    $codelength = strlen($code);
    if ($codelength == 8){
        return true;
    }
    else
    {

        throw new Exception('VALIDATION-CODE-LENGTH');
    }
}
function controle($code){
    if($code == '')
    {
        throw new Exception('SUBMIT-ERROR');
    }
    else
    {
        return true;
    }

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

<h1>Geef uw kortingscode op</h1>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
<?php if(!$isValid):?>
    <ul>
        <li>
            <label for="korting">Kortingscode?</label>
            <input type="korting" name="korting" id="korting" placeholder="<?= $code ?>">
        </li>
    </ul>
    <input type="submit" name="submit">
<?php else: ?>
    <p>korting toegekend</p>

    <?php endif ?>
</body>
</html>
