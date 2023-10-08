<?php

namespace App\Controllers\IngredientsController;

use \App\Models\IngredientsModel;

function ShowAction(\PDO $connexion, int $id)
{
    
    include_once '../app/models/ingredientsModel.php';
    $ingredients = \App\Models\IngredientsModel\findAllRecipesById($connexion, $id);
    
    global $title, $content;
    $title = "Ingrédients";
    ob_start();
    include '../app/views/ingredients/index.php';
    $content = ob_get_clean();
}

