<?php

namespace App\Controllers\UsersController;

use \App\Models\UsersModel;

function loginFormAction(\PDO $connexion)
{
    
    global $title, $content;
    $title = "Users";
    ob_start();
    include '../app/views/users/loginForm.php';
    $content = ob_get_clean();
}


function loginAction(\PDO $connexion, $data)
{
    include_once '../app/models/usersModel.php';
    $user = UsersModel\FindOneByLoginPassword($connexion, $data);

    if($user && password_verify($data['pwd'],$user['password'])):
        $_SESSION['user'] = $user;
        header('location: ' . ROOT_ADMIN);
    else:
        header('location: ' . ROOT . 'users/loginForm');
    endif;
}