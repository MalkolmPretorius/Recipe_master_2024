 <?php

switch ($_GET['recipes']):
    case 'index':
        include_once '../app/controllers/recipesController.php';
    \App\Controllers\RecipesController\indexAction($connexion);
        break;

    case 'show':
        include_once '../app/controllers/recipesController.php';
        \App\Controllers\RecipesController\showAction($connexion, $_GET['id']);
        break;
endswitch;