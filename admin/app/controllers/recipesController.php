<?php

namespace App\Controllers\RecipesController;

use \App\Models\RecipesModel;

include_once '../app/models/recipesModel.php';


function indexRecipesAction(\PDO $connexion) : void
{
    // Je mets le findAll() dans $Recipes
    $recipes = RecipesModel\findAll($connexion);

    // Je charge la vue Recipes.index dans $content
    global $title, $content1;
    $title = "Liste des recette";
    ob_start();
    include '../app/views/recipes/index.php';
    $content1 = ob_get_clean();
}

