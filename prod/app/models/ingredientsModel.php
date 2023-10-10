<?php

namespace App\Models\IngredientsModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *
            FROM ingredients
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllByDishesId(\PDO $connexion, int $id): array
{
    $sql = "SELECT i.name,i.id AS id_ingredients, ROUND(dhi.quantity,0)  AS quantité
            FROM ingredients i
            JOIN  dishes_has_ingredients dhi ON dhi.ingredient_id = i.id
            JOIN dishes d ON dhi.dish_id = d.id
            WHERE d.id = :id
            ORDER BY i.name ASC;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllRecipesById(\PDO $connexion, int $id): array
{
    $sql = "SELECT i.*,i.id ,d.id, d.name AS nom_recette, d.description AS description_recette, ROUND(AVG(r.value),1) AS notation
            FROM ingredients i
            JOIN dishes_has_ingredients dhi ON dhi.ingredient_id = i.id
            JOIN dishes d ON dhi.dish_id = d.id
            JOIN ratings r ON r.dish_id = d.id
            WHERE i.id = :id
            GROUP BY d.id
            ORDER BY d.name ASC;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

