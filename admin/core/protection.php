<?php  

if(!isset($_SESSION['user'])):
    header('location: ' . ROOT_PUBLIC . 'users/login');
endif;