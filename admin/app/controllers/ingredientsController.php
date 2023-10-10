<?php

namespace App\Controllers\IngredientsController;

use \App\Models\IngredientsModel;

include_once '../app/models/ingredientsModel.php';


function indexIngredientsAction(\PDO $connexion)
{
    // Je mets le findAll() dans $ingredients
    $ingredients = IngredientsModel\findAll($connexion);

    // Je charge la vue ingredients.index dans $content
    global $title, $content1;
    $title = "Liste des ingrédients";
    ob_start();
    include '../app/views/ingredients/index.php';
    $content1 = ob_get_clean();
}

function addIngredientsAction()
{
    // Je charge la vue ingredients.add dans $content
    global $title, $content1;
    $title = "Ajouter un ingrédient";
    ob_start();
    include '../app/views/ingredients/add.php';
    $content1 = ob_get_clean();
}

function createIngredientsAction(\PDO $connexion, array $data)
{
    $ingredient = IngredientsModel\insertOne($connexion, $data);
    header('location: ' . ADMIN_ROOT  . 'ingredients');
}

function deleteIngredientsAction(\PDO $connexion, int $id)
{
    $ingredient = IngredientsModel\deleteOne($connexion, $id);
    header('location: ' . ADMIN_ROOT  . 'ingredients');
}

function updateIngredientsAction(\PDO $connexion, array $data)
{
    $ingredient = IngredientsModel\updateOne($connexion, $data);
    header('location: ' . ADMIN_ROOT  . 'ingredients');
}

function updateIngredientFormAction(\PDO $connexion, int $id)
{
    $ingredient = IngredientsModel\findOneById($connexion, $id);

    global $title, $content1;
    $title = "Modifier un ingrédients";
    ob_start();
    include '../app/views/ingredients/updateIngredientForm.php';
    $content1 = ob_get_clean();
}
