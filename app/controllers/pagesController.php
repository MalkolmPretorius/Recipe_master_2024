<?php

namespace App\Controllers\PagesController;

function homeAction(\PDO $connexion)
{
    include_once '../app/models/recipesModel.php';
    $randomRecipes = \App\Models\recipesModel\randomRecipe($connexion);
    $recipes = \App\Models\recipesModel\findAllPopulars($connexion);
    $lastRecipes = \App\Models\recipesModel\findAllLastRecipes($connexion);
    include_once '../app/models/chefsModel.php';
    $chefs = \App\Models\ChefsModel\findAllPopulars($connexion);
    
    
    global $title, $content;
    $title = "Popular recipes - Popular recipes";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}