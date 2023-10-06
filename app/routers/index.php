<?php  
if(isset($_GET['recipes'])) :
    include_once '../app/routers/recipes.php';

elseif(isset($_GET['chefs'])) :
    include_once '../app/routers/chefs.php';

elseif(isset($_GET['categories'])) :
    include_once '../app/routers/categories.php';

elseif(isset($_GET['ingredients'])) :
    include_once '../app/routers/ingredients.php';

else:
include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;