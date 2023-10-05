<?php

namespace App\Controllers\CategoriesController;

use \App\Models\CategoriesModel;

function indexAction(\PDO $connexion)
{
    
    include_once '../app/models/chefsModel.php';
    $categories = \App\Models\ChefsModel\findAll($connexion);
    
    global $title, $content;
    $title = $categories['name'];
    ob_start();
    include '../app/views/chefs/index.php';
    $content = ob_get_clean();
}