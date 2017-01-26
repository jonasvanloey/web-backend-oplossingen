<?php
session_start();
if (isset($_POST['email']))
{
        $admin = 'jvanloey@gmail.com';
        $copy = (isset($_POST['copy'])) ? true : false;


        $db = new PDO('mysql:host=localhost;dbname=opdracht-mail', 'root', '');

        $querystring = 'INSERT INTO contact_messages (email,message,time_sent) VALUES (:email,:message,now())';
        $query = $db->prepare($querystring);
        $query->bindValue(':email', $_POST['email']);
        $query->bindValue(':message', $_POST['boodschap']);
        $query->execute();

        $header = 'From: ' . $_POST['email'];
        $sendmsg = mail($admin, '', $_POST['boodschap'], $header);
        if ($copy)
        {
            $sendcopy = mail($_POST['email'], '', $_POST['boodschap'], $header);
        }

        if ($sendmsg) {
            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
            {
                if (isset($_POST['email'])){
                    $ajaxMessage['type']='succes';

                    $jsonajax = json_encode($ajaxMessage);
                    echo $jsonajax;
                }
            }
            else {
                $_SESSION['message']['type'] = 'success';
                $_SESSION['message']['body'] = 'Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.';
                unset($_SESSION['fieldNames']);
                header('location: contact-form.php');
            }
        }
        else {
            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
            {
                if (isset($_POST['email'])){
                    $ajaxMessage['type']='error';

                    $jsonajax = json_encode($ajaxMessage);
                    echo $jsonajax;
                }
            }
            else {

                $_SESSION['message']['type'] = 'error';
                $_SESSION['message']['body'] = 'er liep iets mis';
                header('location: contact-form.php');
            }
        }




}
