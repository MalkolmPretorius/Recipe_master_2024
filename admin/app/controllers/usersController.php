<?php

namespace App\Controllers\UsersController;

use \App\Models\UsersModel;

function dashboardAction(\PDO $connexion)
{
    
    global $content1, $title;
    $title = "Users";
    ob_start();
    include '../app/views/users/dashboard.php';
    $content1 = ob_get_clean();
}
function logoutAction(\PDO $connexion)
{
    unset($_SESSION['user']);
    header('location: ' . ROOT_PUBLIC);
}