<?php

use \App\Controllers\IngredientsController;

include_once '../app/controllers/IngredientsController.php';

switch ($_GET['ingredients']):
    case 'add':
        IngredientsController\addIngredientsAction();
        break;
    case 'create':
        IngredientsController\createIngredientsAction($connexion, $_POST);
        break;
    case 'delete':
         IngredientsController\deleteIngredientsAction($connexion, $_GET['id']);
        break;
    case 'update':
         IngredientsController\updateIngredientsAction($connexion,$_POST);
         break;
    case 'updateForm':
        IngredientsController\updateIngredientFormAction($connexion, $_GET['id']);
        break;
    default:
        IngredientsController\indexIngredientsAction($connexion);
        break;
endswitch;