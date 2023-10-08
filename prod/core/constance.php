<?php  

define('ROOT', 'http://'
    . $_SERVER['HTTP_HOST']
    . str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']));

define('ROOT_ADMIN', 'http://'
    . $_SERVER['HTTP_HOST']
    . str_replace(PUBLIC_FOLDER , ADMIN_FOLDER , str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME'])));