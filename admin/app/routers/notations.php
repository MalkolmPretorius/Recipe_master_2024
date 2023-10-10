<?php

use \App\Controllers\NotationsController;

include_once '../app/controllers/notationsController.php';

switch ($_GET['notations']):
    case 'add':
        NotationsController\addNotationsAction($connexion);
        break;
    case 'delete':
         NotationsController\deleteNotationsAction($connexion, [
            'user_id' => $_GET['usersId'],
            'dish_id' => $_GET['dishesId']]);
        break;
    case 'create':
        NotationsController\createNotationsAction($connexion, $_POST);
        break;
        case 'update':
            NotationsController\updateNotationsAction($connexion, [
                'user_id' => $_POST['user_id'],
                'dish_id' => $_POST['dish_id'],
                'notation' => $_POST['notation'],
                'oldUserId' => $_POST['oldUserId'],
                'oldDishId' => $_POST['oldDishId'] 
            ]);
            break;
       case 'updateForm':
           NotationsController\updateNotationFormAction($connexion, [
            'user_id' => $_GET['usersId'],
            'dish_id' => $_GET['dishesId']]);
           break;
   
    default:
        NotationsController\indexNotationsAction($connexion);
        break;
endswitch;