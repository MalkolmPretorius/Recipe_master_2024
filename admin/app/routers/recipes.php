<?php

use \App\Controllers\RecipesController;

include_once '../app/controllers/recipesController.php';

switch ($_GET['recipes']):
    case 'add':
        RecipesController\addRecipesAction($connexion);
        break;
    case 'create':
        RecipesController\createRecipesAction($connexion, $_POST);
        break;
    case 'delete':
        RecipesController\deleteRecipesAction($connexion, [
            'user_id' => $_GET['usersId'],
            'dish_id' => $_GET['dishesId']
        ]);
    case 'update':
        $ingredients = [];
        
        foreach ($_POST['ingredients'] as $ingredient) {
            $ingredients[] = $ingredient;
        }

        
        RecipesController\updateRecipesAction($connexion, [
            'user_id' => $_POST['user_id'],
            'dish_name' => $_POST['dish_name'],
            'dish_id' => $_POST['dish_id'],
            'type_id' => $_POST['type_id'],
            'description' => $_POST['description'],
            'oldUserId' => $_POST['oldUserId'],
            'ingredients' =>$ingredients
        ]);
        break;
    case 'updateForm':
        RecipesController\updateRecipeFormAction($connexion, [
            'user_id' => $_GET['usersId'],
            'dish_id' => $_GET['dishesId']
        ]);
        break;
    default:
        RecipesController\indexRecipesAction($connexion);
        break;
endswitch;
