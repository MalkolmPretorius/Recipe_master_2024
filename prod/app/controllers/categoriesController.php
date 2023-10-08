<?php

namespace App\Controllers\CategoriesController;

use \App\Models\CategoriesModel;

function ShowAction(\PDO $connexion, int $id)
{
    
    include_once '../app/models/categoriesModel.php';
    $categories = \App\Models\CategoriesModel\findAllRecipesById($connexion, $id);
    
    global $title, $content;
    $title = "Catégories";
    ob_start();
    include '../app/views/categories/index.php';
    $content = ob_get_clean();
}

