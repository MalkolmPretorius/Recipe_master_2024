<?php

namespace App\Controllers\NotationsController;

use \App\Models\NotationsModel;

include_once '../app/models/notationsModel.php';


function indexNotationsAction(\PDO $connexion)
{
    // Je mets le findAll() dans $notations
    $notations = NotationsModel\findAll($connexion);

    // Je charge la vue notations.index dans $content
    global $title, $content1;
    $title = "Liste des notations";
    ob_start();
    include '../app/views/notations/index.php';
    $content1 = ob_get_clean();
}