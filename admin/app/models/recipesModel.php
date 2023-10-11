<?php

namespace App\Models\RecipesModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT d.*,d.id AS dish_id, d.name AS dish_name, u.name AS user_name, u.id AS user_id
            FROM dishes AS d
            INNER JOIN users AS u ON d.user_id = u.id
            ORDER BY id ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllUsers(\PDO $connexion): array
{
    $sql = "SELECT * 
    FROM  users u
    ORDER BY u.id ASC;";
$rs = $connexion->query($sql);
return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllIngredients(\PDO $connexion): array
{
    $sql = "SELECT i.id,
    i.name AS ingredientName
    FROM   ingredients i
    ORDER BY id ASC;";
$rs = $connexion->query($sql);
return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findIngredients(\PDO $connexion, int $id): array
{
    $sql = "SELECT 
    di.id AS recipeID, 
    di.name AS recipeName,
    ing.id AS ingredientID,
    ing.unit AS ingredientUnit, 
    ing.name AS ingredientName
    FROM dishes di
    JOIN dishes_has_ingredients dhi ON di.id = dhi.dish_id
    JOIN ingredients ing ON dhi.ingredient_id = ing.id
    WHERE di.id = :dishId;";
    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(':dishId', $id, \PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllCategories(\PDO $connexion): array
{
    $sql = "SELECT * 
    FROM  types_of_dishes tod
    ORDER BY tod.id ASC;";
$rs = $connexion->query($sql);
return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function insertOne(\PDO $connexion, array $data)
{
    $sql = "INSERT INTO dishes
            SET name = :name,
            description = :description,
            user_id = :user_id,
            type_id = :type_id,
            created_at =NOW();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    $rs->bindValue(':user_id', $data['user_id'], \PDO::PARAM_STR);
    $rs->bindValue(':type_id', $data['type_id'], \PDO::PARAM_STR);
    return $rs->execute();
}
function addIngredientsToLastDish(\PDO $connexion, array $data)
{
    $dishId = $connexion->lastInsertId();
    $sql = "INSERT INTO dishes_has_ingredients(dish_id,ingredient_id,quantity)
            values (:dishId,:newIngredientId, 0)";
    $rs = $connexion->prepare($sql);
    foreach ($data['ingredients'] as $newIngredient) {
        $rs->bindValue(':newIngredientId', $newIngredient, \PDO::PARAM_INT);
        $rs->bindValue(':dishId', $dishId, \PDO::PARAM_INT);
        $rs->execute();
    }
    
}

function addIngredients(\PDO $connexion, array $data, int $id)
{
    $sql = "INSERT INTO dishes_has_ingredients(dish_id,ingredient_id,quantity)
            values (:dishId,:newIngredientId, 0)";
    $rs = $connexion->prepare($sql);
    foreach ($data['ingredients'] as $newIngredient) {
        $rs->bindValue(':newIngredientId', $newIngredient, \PDO::PARAM_INT);
        $rs->bindValue(':dishId', $id, \PDO::PARAM_INT);
        $rs->execute();
    }
    
}

function deleteIngredients(\PDO $connexion, array $data, int $id) : bool
{
    $sql = "DELETE FROM ingredients 
            WHERE id  = :dish_id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':dish_id', $id, \PDO::PARAM_STR);
    return $rs->execute();
}





function deleteOne(\PDO $connexion, array $data) : bool
{
    $sql = "DELETE FROM dishes 
            WHERE user_Id  = :user_id
            AND id  = :dish_id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':user_id', $data['user_id'], \PDO::PARAM_STR);
    $rs->bindValue(':dish_id', $data['dish_id'], \PDO::PARAM_STR);
    return $rs->execute();
}

function updateOne(\PDO $connexion, array $data)
    {
        $sql = "UPDATE dishes
                SET user_id = :user_id,
                name = :dish_name,
                type_id = :type_id,
                description = :description
                WHERE id  = :dish_id;";
        $rs = $connexion->prepare($sql);
        $rs->bindValue(':user_id', $data['user_id'], \PDO::PARAM_STR);
        $rs->bindValue(':dish_name', $data['dish_name'], \PDO::PARAM_STR);
        $rs->bindValue(':type_id', $data['type_id'], \PDO::PARAM_STR);
        $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
        $rs->bindValue(':dish_id', $data['dish_id'], \PDO::PARAM_STR);
        $rs->execute();

        $sql = "DELETE FROM dishes_has_ingredients 
                WHERE dish_id  = :dish_id;";
        $rs = $connexion->prepare($sql);
        $rs->bindValue(':dish_id', $data['dish_id'], \PDO::PARAM_STR);
        $rs->execute();

        if (!empty($data['ingredients'])) {
            $sql = "INSERT INTO dishes_has_ingredients(dish_id,ingredient_id,quantity)
                    values (:dish_id,:newIngredientId, 0)";
            $rs = $connexion->prepare($sql);
            foreach ($data['ingredients'] as $newIngredient) {
                $rs->bindValue(':newIngredientId', $newIngredient, \PDO::PARAM_INT);
                $rs->bindValue(':dish_id', $data['dish_id'], \PDO::PARAM_INT);
                $rs->execute();
            }
        }
    }




function findOneById(\PDO $connexion, array $data): array
{
    $sql = "SELECT   
            d.id AS dishId,
            d.description AS description,
            d.name AS dishName,
            r.value AS notation,
            u.id AS userId,
            u.name AS userName, 
            tod.id AS categoryId,
            tod.name AS categoryName
            FROM dishes d
            JOIN types_of_dishes tod ON d.type_id = tod.id
            JOIN users u ON d.user_id = u.id
            LEFT JOIN ratings r ON r.dish_id = d.id
            WHERE d.id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $data['user_id'], \PDO::PARAM_INT);
    $rs->execute();
    $result = $rs->fetch(\PDO::FETCH_ASSOC);
    return $result !== false ? $result : [];
}

function findAllIngredientsByDishesId(\PDO $connexion, int $id){
        $sql = 
        "SELECT
            i.id AS ingredient_id
        FROM
            dishes_has_ingredients dhi
        JOIN
            ingredients i ON dhi.ingredient_id = i.id
        WHERE
            dhi.dish_id = :id;";
        $rs = $connexion->prepare($sql);
        $rs->bindValue(':id', $id, \PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(\PDO::FETCH_ASSOC);
    }
