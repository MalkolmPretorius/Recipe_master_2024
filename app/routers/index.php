<?php  
if(isset($_GET['recipes'])) :
    include_once '../app/controllers/recipesController.php';
    \App\Controllers\RecipesController\indexAction($connexion);
elseif(isset($_GET['chefs'])) :
    include_once '../app/controllers/chefsController.php';
    \App\Controllers\ChefsController\indexAction($connexion);
else:
include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;