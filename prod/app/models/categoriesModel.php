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
    $sql = "SELECT tod.*, d.id AS id,d.name AS nom_recette, d.description AS description_recette, COALESCE(notation, 0) AS notation
            FROM types_of_dishes tod
            JOIN dishes d ON d.type_id = tod.id
            LEFT JOIN (
            SELECT dish_id, ROUND(AVG(value),1) AS notation
            FROM ratings
            GROUP BY dish_id ) r ON d.id = r.dish_id
            WHERE tod.id = :id
            GROUP BY d.id
            ORDER BY d.name ASC;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
    