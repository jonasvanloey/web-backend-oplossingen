<?php
function __autoload($className)
{
    require_once 'classes/' . $className.'.php';
}

$site = new HTMLbuilder('header-partial.php','body-partial.php','footer-partial.php')

?>

