<?php
session_start();
if (isset($_POST['submit']))
{
    $admin = 'jvanloey@gmail.com';
    $copy = (isset($_POST['copy'])) ? true : false;


    $db = new PDO('mysql:host=localhost;dbname=opdracht-mail', 'root', '');

    $querystring = 'INSERT INTO contact_messages (email,message,time_sent) VALUES (:email,:message,now())';
    $query = $db->prepare($querystring);
    $query->bindValue(':email',$_POST['email']);
    $query->bindValue(':message',$_POST['boodschap']);
    $query->execute();

    $header = 'From: '.$_POST['email'];
    $sendmsg = mail($admin,'',$_POST['boodschap'],$header);
    if ($copy)
    {
        $sendcopy = mail($_POST['email'],'',$_POST['boodschap'],$header);
    }

    if ($sendmsg)
    {
        $_SESSION['message']['type'] 	=	'success';
        $_SESSION['message']['body']	=	'Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.';
    }

    header('location: contact-form.php');
}