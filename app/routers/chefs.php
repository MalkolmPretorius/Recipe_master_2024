 <?php

switch ($_GET['chefs']):
    case 'index':
        include_once '../app/controllers/chefsController.php';
        \App\Controllers\ChefsController\indexAction($connexion);
        break;

    case 'show':
        include_once '../app/controllers/chefsController.php';
        \App\Controllers\ChefsController\showAction($connexion,$_GET['id']);
        break;
endswitch;