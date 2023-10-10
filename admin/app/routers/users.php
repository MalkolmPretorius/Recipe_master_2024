<?php
use \App\Controllers\UsersController;
include_once '../app/controllers/usersController.php';

switch ($_GET['users']):

    case 'logout':
        include_once '../app/controllers/usersController.php';
        \App\Controllers\usersController\logoutAction($connexion);
        break;
        case 'add':
            UsersController\addUsersAction();
            break;
        case 'create':
            UsersController\createUsersAction($connexion, $_POST);
            break;
        case 'delete':
             UsersController\deleteUsersAction($connexion, $_GET['id']);
            break;
        case 'update':
             UsersController\updateUsersAction($connexion,$_POST);
             break;
        case 'updateForm':
            UsersController\updateUserFormAction($connexion, $_GET['id']);
            break;
    default:
        UsersController\indexUsersAction($connexion);
    break;
endswitch;