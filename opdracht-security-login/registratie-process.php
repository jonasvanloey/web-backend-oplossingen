<?php
session_start();
$registrationFormName	=	"registratie-form.php";
if(isset($_POST['genereer']))
{
    $generated = generatePassword(10,true,true,true,true);
    $_SESSION['registratie']['mail']= $_POST['mail'];
    $_SESSION['registratie']['paswoord']= $generated;
    header( 'location: ' . $registrationFormName );
}
elseif (isset($_POST['registreer'])) {
    $mail = $_POST['mail'];
    $password = $_POST['paswoord'];
    $emailcorrect = filter_var($mail, FILTER_VALIDATE_EMAIL);

    if (!$emailcorrect) {
        $_SESSION['registratie']['notification']['type'] = 'error';
        $_SESSION['registratie']['notification']['notmail'] = 'gelieve een e-mailadres in te voeren';
        header('location: ' . $registrationFormName);
    }
    else
    {
        $db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '' );

        $querystring = 'SELECT * FROM users WHERE email = :email';
        $getdata = $db->prepare($querystring);
        $getdata->bindValue(':email',$mail);
        $getdata->execute();

        if($getdata->rowCount()==1)
        {
            $_SESSION['registratie']['notification']['type'] = 'error';
            $_SESSION['registratie']['notification']['exists'] = 'de gebruiker met het e-mailadres '.$mail.' bestaat al.';
            header('location: ' . $registrationFormName);
        }
        else
        {
            createnewuser($mail,$password);

            header('location: dashboard.php');
        }
    }
}
function createnewuser($mail,$password)
{
    $db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '' );

    $salt = uniqid(mt_rand(), true);
    $hashedPassword	=	hash( 'sha512', $salt . $password );

    $querystring = 'INSERT INTO users (email,salt,hashed_password,last_login_time)VALUES (:email,:salt,:password,NOW())';
    $insert = $db->prepare($querystring);
    $insert->bindValue(':email' , $mail);
    $insert->bindValue(':salt' , $salt);
    $insert->bindValue(':password', $hashedPassword);
    $insert->execute();

    $cookie = createcookie($salt,$mail);
    return $cookie;


}
function createcookie($salt,$mail)
{
    $hashedmail	=	hash( 'sha512', $salt . $mail );
    $cookieValue	=	$mail . ',' . $hashedmail;

    $cookie	=	setcookie( 'authenticated', $cookieValue, time() + 3600 );

    return $cookie;
}
function generatePassword($length,
                          $numeric = TRUE,
                          $alphanumeric = FALSE,
                          $alphanumericUppercase = FALSE,
                          $specialChars = FALSE){

    $newpassword = '';
    $allowedcharacters = array();

    if ($numeric){ $allowedcharacters['numeric']=array(1,2,3,4,5,6,7,8,9);}
    if ($alphanumeric){$allowedcharacters['alphanumeric']=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');}
    if ($alphanumericUppercase){ $passwordCharacters['alphanumericUppercaseString'] = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');}
    if ($specialChars){ $passwordCharacters['specialChars'] = array('+','-','*','/','$','%','@','#','_');}

    $i = 0;
    while ($i<$length)
    {
        $a = 0;
        foreach ($allowedcharacters as $value) {
            if ($i < $length) {

            $selectrandom = rand(0, count($value) - 1);
            $newpassword .= $value[$selectrandom];
                $i++;

            }
            $a++;
        }
    }

    $newpassword = str_shuffle($newpassword);


    return $newpassword;
}
?>