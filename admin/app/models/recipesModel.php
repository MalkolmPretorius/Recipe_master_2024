<?php

namespace App\Models\RecipesModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *
            FROM dishes
            ORDER BY id ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
