<?php

use \App\Controllers\RecipesController;

include_once '../app/controllers/recipesController.php';

switch ($_GET['recipes']):
    
    default:
        RecipesController\indexRecipesAction($connexion);
        break;
endswitch;