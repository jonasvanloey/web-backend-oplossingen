<?php
function __autoload($className)
{
    require_once 'classes/' . $className.'.php';

    var_dump($className);
}

$site = new HTMLBuilder('header-partial.php','body-partial.php','footer-partial.php')

?>

