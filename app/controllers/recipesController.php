<?php

namespace App\Controllers\RecipesController;


function indexAction(\PDO $connexion)
{
    
    include_once '../app/models/recipesModel.php';
    $recipes = \App\Models\RecipesModel\findAll($connexion);
    
    global $title, $content;
    $title = "Recipes ";
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}