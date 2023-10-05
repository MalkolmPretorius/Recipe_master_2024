<?php

namespace App\Models\RecipesModel;

function findAllPopulars(\PDO $connexion): array
{
    $sql = "SELECT d.name AS nom_recette,u.name AS auteur,CONCAT(LEFT(d.description,100), '...') AS description_recette,ROUND(AVG(r.value), 1) AS notation_moyenne,COUNT(c.id) AS nombre_commentaires,d.id AS id
            FROM dishes d
            JOIN users u ON d.user_id = u.id
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN  comments c ON d.id = c.dish_id
            GROUP BY d.id
            ORDER BY AVG(r.value) DESC
            LIMIT 3;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllLastRecipes(\PDO $connexion): array
{
    $sql = "SELECT  d.name AS nom_recette,r.value AS notation,CONCAT(LEFT(d.description,100), '...') AS description_recette,d.id AS id
            FROM ratings r
            JOIN dishes d ON r.dish_id = d.id
            ORDER BY r.created_at DESC
            LIMIT 3;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function randomRecipe(\PDO $connexion): array
{
    $sql = "SELECT d.name AS nom_recette,r.value AS notation,u.name AS auteur,COUNT(c.id) AS nombre_commentaires,d.id AS id
            FROM dishes d
            INNER JOIN users u ON d.user_id = u.id
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN comments c ON d.id = c.dish_id
            GROUP BY d.id, notation
            ORDER BY RAND()
            LIMIT 1;";
$rs = $connexion->query($sql);
return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAll(\PDO $connexion): array
{
    $sql = "SELECT d.name AS nom_recette,ROUND(AVG(r.value), 1)AS notation_moyenne,CONCAT(LEFT(d.description,100), '...') AS description_recette,u.name AS auteur,COUNT(c.id) AS nombre_commentaires,d.id AS id
            FROM dishes d
            JOIN users u ON d.user_id = u.id
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN comments c ON d.id = c.dish_id
            GROUP BY d.id, d.name, d.description, u.name
            ORDER BY d.created_at DESC
            LIMIT 9;";
$rs = $connexion->query($sql);
return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, int $id): array
{
    $sql = "SELECT d.id,d.name AS nom_recette,ROUND(AVG(r.value), 1) AS notation,d.prep_time AS temps_preparation,d.description AS description_recette,u.name AS auteur_recette,COUNT(c.id) AS nombre_commentaires, c.content AS commentaire, u.picture AS picture
            FROM dishes d
            JOIN users u ON d.user_id = u.id
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN comments c ON d.id = c.dish_id
            WHERE d.id = :id
            GROUP BY d.id,c.content
            LIMIT 1;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

