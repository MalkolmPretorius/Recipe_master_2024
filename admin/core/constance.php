<?php  

define('ROOT', 'http://'
    . $_SERVER['HTTP_HOST']
    . str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']));

define('ROOT_PUBLIC', 'http://'
    . $_SERVER['HTTP_HOST']
    . str_replace(ADMIN_FOLDER,PUBLIC_FOLDER,str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME'])));