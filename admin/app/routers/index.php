<?php
// ROUTE DES CATÉGORIES
if (isset($_GET[('categories')])) :
    include_once '../app/routers/categories.php';

// Route des ingredients
elseif (isset($_GET[('ingredients')])) :
    include_once '../app/routers/ingredients.php';

// Route des notations
elseif (isset($_GET[('notations')])):
    include_once '../app/routers/notations.php';

// Route des users
elseif (isset($_GET[('users')])):
    include_once '../app/routers/users.php';

else:
    include_once '../app/controllers/usersController.php';
    \App\Controllers\UsersController\dashboardAction($connexion);

endif;
