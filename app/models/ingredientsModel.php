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
    $sql = "SELECT *
            FROM ingredients i
            JOIN  dishes_has_ingredients dhi ON dhi.ingredient_id = i.id
            WHERE dhi.dish_id = :id
            ORDER BY i.name ASC;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
