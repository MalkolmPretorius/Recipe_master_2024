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

function addRecipesAction(\PDO $connexion): void
{
    $users = RecipesModel\findAllUsers($connexion);
    $categories = RecipesModel\findAllCategories($connexion);
    $ingredients = RecipesModel\findAllIngredients($connexion);
    // Je charge la vue recipes.add dans $content
    global $title, $content1;
    $title = "Ajouter un recipes";
    ob_start();
    include '../app/views/recipes/add.php';
    $content1 = ob_get_clean();
}

function createRecipesAction(\PDO $connexion, array $data)
{
    
    RecipesModel\insertOne($connexion, $data);
    RecipesModel\addIngredientsToLastDish($connexion, $data);
    header('location: ' . ADMIN_ROOT  . 'recipes');
}

function deleteRecipesAction(\PDO $connexion, array $data)
{
    
    $recipe = RecipesModel\deleteOne($connexion, $data);
    header('location: ' . ADMIN_ROOT  . 'recipes');
}

function updateRecipesAction(\PDO $connexion, array $data): void
{   
    RecipesModel\updateOne($connexion, $data);
    header('location: ' . ADMIN_ROOT  . 'recipes');
}

function updateRecipeFormAction(\PDO $connexion, array $data): void
{
    
    $recipe = RecipesModel\findOneById($connexion, $data);
    $users = RecipesModel\findAllUsers($connexion);
    $categories = RecipesModel\findAllCategories($connexion);
    $ingredients = RecipesModel\findAllIngredients($connexion);
    $checked = RecipesModel\findAllIngredientsByDishesId($connexion, $data['dish_id']);
    $recipeIngredients = RecipesModel\findIngredients($connexion, $data['dish_id']);


    $checked_id = array_column($checked, 'ingredientId');
    global $title, $content1;
    $title = "Modifier une recette";
    ob_start();
    include '../app/views/recipes/updateRecipeForm.php';
    $content1 = ob_get_clean();
}
