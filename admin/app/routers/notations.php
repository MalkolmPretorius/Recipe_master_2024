<?php

use \App\Controllers\NotationsController;

include_once '../app/controllers/notationsController.php';

switch ($_GET['notations']):
  
    default:
        NotationsController\indexNotationsAction($connexion);
        break;
endswitch;