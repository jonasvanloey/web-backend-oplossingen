<?php

/**
 * Created by PhpStorm.
 * User: jonas
 * Date: 15/12/2016
 * Time: 14:32
 */
class validation
{
    public static function authenticate($connection){
        if (isset($_COOKIE['authenticated']))
        {
            $userdata =  explode(",",$_COOKIE['authenticated']);
            $mail = $userdata[0];
            $saltedmail = $userdata[1];

            $db = $connection;
            $querystring = "SELECT * FROM users WHERE email = :email";
            $query = $db->prepare($querystring);
            $query->bindValue(':email',$mail);
            $query->execute();
            if ($query->columnCount()==1)
            {
                $row = $query->fetch(PDO::FETCH_ASSOC);

                $salt = $row['salt'];
                $newlySaltedEmail 	= hash( 'sha512' , $salt . $mail );
                if ($newlySaltedEmail==$saltedmail)
                {
                   return true;
                }
                else
                {
                    return false;
                }

            }
            else
            {
                return false;
            }


        }
        else
        {
            return false;
        }

    }

}
?>