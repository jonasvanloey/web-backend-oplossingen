<?php
session_start();
define( 'SERVER_PATH', getcwd() . '\\' );
try{
    if (isset($_POST['submit']))
    {
        if ((($_FILES['file']['type']== "image/gif")||($_FILES['file']['type']== "image/jpeg")||($_FILES['file']['type']== "image/png"))&&($_FILES['file']['size']<2000000))
            {
                $timestamp = time();
                $bestandsnaam = $timestamp.'_'.$_FILES['file']['name'].'.'.$_FILES['file']['type'];
                move_uploaded_file($bestandsnaam, SERVER_PATH . 'img\\' . $bestandsnaam);
            }
        else
            {

            }
    }
}
catch (exception $e)
{

}
?>