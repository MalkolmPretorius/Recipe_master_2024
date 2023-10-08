<?php

namespace App\Models\CategoriesModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *
            FROM types_of_dishes
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllRecipesById(\PDO $connexion, int $id): array
{
    $sql = "SELECT tod.*, d.id AS id,d.name AS nom_recette, d.description AS description_recette, ROUND(AVG(r.value),1) AS notation
            FROM types_of_dishes tod
            JOIN dishes d ON d.type_id = tod.id
            JOIN ratings r ON r.dish_id = d.id
            WHERE tod.id = :id
            GROUP BY d.id
            ORDER BY d.name ASC;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
