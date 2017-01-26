<?php
session_start();
if(isset($_SESSION['message']))
{
    $message['type']	=	$_SESSION['message']['type'];
    $message['body']	=	$_SESSION['message']['body'];

    unset($_SESSION['message']);
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
<?php if (isset($message)): ?>
    <div class="modal <?php echo $message['type'] ?>">
        <?php echo $message['body'] ?>
    </div>
<?php endif ?>
<div id="formdiv">
<form action="contact.php" id="sendform" method="post">
    <p>emailadres</p>
    <input type="text" name="email">
    <p>boodschap</p>
    <textarea name="boodschap" id="boodschap" cols="30" rows="10"></textarea>
    <label for="send-copy">Stuur kopie naar mezelf</label>
    <input type="checkbox" name="copy" >

    <input type="submit" name="submit" value="verzenden">
</form>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(function () {
        $('#sendform').submit(function () {

            var mail = $('#sendform').serialize();

            &.ajax({
                type: 'POST',
                url: 'contact-API.php',
                data: mail,
                success: function(data) {
                    parsedData = JSON.parse(data);
                    if (parsedData['type']=='succes')
                    {
                        $('#formdiv form').fadeOut('slow', function(){

                            $('#formdiv').append('<p id="modal">Bedankt! Uw bericht is goed verzonden!</p>').hide().fadeIn('slow');
                        });
                    }
                    if (parsedData['type']=='error')
                    {
                        $('#formdiv').prepend('<p id="modal">Oeps, er ging iets mis. Probeer opnieuw!</p>')
                        $('#modal').hide().fadeIn('slow');
                    }


                }

            });


            return false;
        })
        
    })
</script>
</body>
</html>
