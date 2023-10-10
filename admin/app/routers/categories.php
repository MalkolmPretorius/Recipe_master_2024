<?php

use \App\Controllers\CategoriesController;

include_once '../app/controllers/categoriesController.php';

switch ($_GET['categories']):
    case 'add':
        CategoriesController\addCategoriesAction();
        break;
    case 'create':
        CategoriesController\createCategoriesAction($connexion, $_POST);
        break;
    case 'delete':
         CategoriesController\deleteCategoriesAction($connexion, $_GET['id']);
        break;
    case 'update':
         CategoriesController\updateCategoriesAction($connexion,$_POST);
         break;
    case 'updateForm':
        CategoriesController\updateCategoryFormAction($connexion, $_GET['id']);
        break;
    default:
        CategoriesController\indexCategoriesAction($connexion);
        break;
endswitch;