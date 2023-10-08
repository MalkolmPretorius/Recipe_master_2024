<?php

switch ($_GET['users']):

    case 'logout':
        include_once '../app/controllers/usersController.php';
        \App\Controllers\usersController\logoutAction($connexion);
        break;
endswitch;