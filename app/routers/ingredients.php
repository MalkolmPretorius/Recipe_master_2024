<?php

switch ($_GET['ingredients']):
    case 'show':
        include_once '../app/controllers/categoriesController.php';
        \App\Controllers\CategoriesController\showAction($connexion, $_GET['id']);
        break;

   
endswitch;