<?php

namespace App\Controllers\ChefsController;

use \App\Models\ChefsModel;

function ShowAction(\PDO $connexion, int $id)
{
    
    include_once '../app/models/ingredientsModel.php';
    $categories = \App\Models\IngredientsModel\findAllRecipesById($connexion, $id);
    
    global $title, $content;
    $title = "Ingrédients";
    ob_start();
    include '../app/views/ingredients/index.php';
    $content = ob_get_clean();
}

