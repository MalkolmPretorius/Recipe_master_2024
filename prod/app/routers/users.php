<?php

switch ($_GET['users']):

    case 'loginForm':
        include_once '../app/controllers/usersController.php';
        \App\Controllers\usersController\loginFormAction($connexion);
        break;

        case 'login':
            include_once '../app/controllers/usersController.php';
            \App\Controllers\usersController\loginAction($connexion,[
                'login' => $_POST['login'],
                'pwd' => $_POST['pwd'],
            ]);
            break;
endswitch;