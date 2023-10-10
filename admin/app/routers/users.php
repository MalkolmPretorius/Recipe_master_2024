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
            UsersController\createUsersAction($connexion, [
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'biography' => $_POST['biography'],
                'picture' => $_FILES['picture']
            ]);
            break;
        case 'delete':
             UsersController\deleteUsersAction($connexion, $_GET['id']);
            break;
        case 'update':
             UsersController\updateUsersAction($connexion,[
                'id' => $_POST['id'],
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'biography' => $_POST['biography'],
                'new_picture' => $_FILES['new_picture'],
                'old_picture' => $_POST['old_picture']
            ]);
             break;
        case 'updateForm':
            UsersController\updateUserFormAction($connexion, $_GET['id']);
            break;
    default:
        UsersController\indexUsersAction($connexion);
    break;
endswitch;