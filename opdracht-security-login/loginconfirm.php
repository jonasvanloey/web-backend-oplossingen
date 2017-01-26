<?php
session_start();
function __autoload( $classname )
{
    require_once( $classname . '.php' );
}


$page = "login.php";
if (isset($_POST['submit']))
{
    $email		=	$_POST[ 'email' ];
    $password	=	$_POST[ 'password' ];

    $_SESSION[ 'login' ][ 'email' ]		=	$email;
    $_SESSION[ 'login' ][ 'password' ]	=	$password;


    $isEmail	=	filter_var( $email, FILTER_VALIDATE_EMAIL );

    if ( !$isEmail )
    {
        $emailError = new Message( "error", "Dit is geen geldig e-mailadres. Vul een geldig e-mailadres in." );

        header('location: ' . $loginFormName );
    }


    elseif ( $password == '' )
    {
        new Message( "error", "Dit is geen geldig paswoord. Vul een geldig paswoord in." );

        header('location: ' . $loginFormName );
    }
    else{
        $db = new PDO('mysql:host=localhost;dbname=opdracht-security-login', 'root', '');
        $querystring = 'SELECT * FROM users WHERE email = :email';
        $query = $db->prepare($querystring);
        $query->bindValue(':email',$email);
        $query->execute();
        if ($query->columnCount()==1)
        {
            var_dump( $_POST );
            $row = $query->fetch(PDO::FETCH_ASSOC);

            $salt = $row['salt'];
            $password=$row['hashed_password'];
            $newlySaltedpasword	= hash( 'sha512' , $salt . $password );

            var_dump($newlySaltedpasword);
            if ($newlySaltedpasword == $password)
            {
               $loginuser = createcookie($salt,$email);

                if ( $loginUser )
                {
                    $registrationSuccess = new Message("success", "Welkom, u bent ingelogd.");
                    header('location: dashboard.php');
                }
            }
            else
            {
                $userExistsMessage	=	new Message('error', 'U kon niet ingelogd worden. Probeer opnieuw.');
                header('location: ' . $page );
            }

        }
        else
        {
            $userExistsMessage	=	new Message('error', 'Deze gebruiker komt niet voor in de database. Klopt het e-mailadres wel?');
            header('location: ' . $page );
        }

    }
}
function createcookie ($salt,$email)
{
    $hashedmail	=	hash( 'sha512', $salt . $email );
    $cookieValue	=	$email . ',' . $hashedmail;

    $cookie	=	setcookie( 'authenticated', $cookieValue, time() + 3600 );

    return $cookie;
}