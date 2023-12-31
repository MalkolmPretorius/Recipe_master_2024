<?php

namespace App\Models\RecipesModel;

function findAllPopulars(\PDO $connexion): array
{
    $sql = "SELECT d.name AS nom_recette,u.name AS auteur,d.description AS description_recette,ROUND(AVG(r.value), 1) AS notation_moyenne,COALESCE(compteur_commentaires, 0) AS nombre_commentaires,d.id AS id
            FROM dishes d
            JOIN users u ON d.user_id = u.id
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN (
            SELECT dish_id, COUNT(id) AS compteur_commentaires
            FROM comments
            GROUP BY dish_id ) c ON d.id = c.dish_id
            GROUP BY d.id
            ORDER BY AVG(r.value) DESC
            LIMIT 3;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllLastRecipes(\PDO $connexion): array
{
    $sql = "SELECT  d.name AS nom_recette,r.value AS notation,d.description AS description_recette,d.id AS id
            FROM ratings r
            JOIN dishes d ON r.dish_id = d.id
            ORDER BY r.created_at DESC
            LIMIT 3;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function randomRecipe(\PDO $connexion): array
{
    $sql = "SELECT d.name AS nom_recette,r.value AS notation,u.name AS auteur,COALESCE(compteur_commentaires, 0) AS nombre_commentaires,d.id AS id
            FROM dishes d
            INNER JOIN users u ON d.user_id = u.id
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN (
            SELECT dish_id, COUNT(id) AS compteur_commentaires
            FROM comments
            GROUP BY dish_id ) c ON d.id = c.dish_id
            GROUP BY d.id, notation
            ORDER BY RAND()
            LIMIT 1;";
$rs = $connexion->query($sql);
return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAll(\PDO $connexion): array
{
    $sql = "SELECT d.name AS nom_recette,ROUND(AVG(r.value), 1)AS notation_moyenne,d.description AS description_recette,u.name AS auteur,COALESCE(compteur_commentaires, 0) AS nombre_commentaires,d.id AS id
            FROM dishes d
            JOIN users u ON d.user_id = u.id
            LEFT JOIN ratings r ON d.id = r.dish_id
            LEFT JOIN (
            SELECT dish_id, COUNT(id) AS compteur_commentaires
            FROM comments
            GROUP BY dish_id ) c ON d.id = c.dish_id 
            GROUP BY d.id, d.description, u.name
            ORDER BY d.created_at DESC
            LIMIT 9;";
$rs = $connexion->query($sql);
return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, int $id): array
{
    $sql = "SELECT d.id,d.name AS nom_recette,COALESCE(notation, 0) notation,d.prep_time AS temps_preparation,d.description AS description_recette,u.name AS auteur_recette,COALESCE(compteur_commentaires, 0) AS nombre_commentaires,commentaire, u.picture AS picture, i.id AS id_ingredients, i.name AS name
            FROM dishes d
            JOIN users u ON d.user_id = u.id
            JOIN dishes_has_ingredients dhi ON dhi.dish_id = d.id
            JOIN ingredients i ON dhi.ingredient_id = i.id
            LEFT JOIN (
            SELECT dish_id, ROUND(AVG(value), 1) AS notation
            FROM ratings
            GROUP BY dish_id ) r ON d.id = r.dish_id
            LEFT JOIN (
            SELECT dish_id,content AS commentaire, COUNT(id) AS compteur_commentaires
            FROM comments
            GROUP BY dish_id,commentaire ) c ON d.id = c.dish_id
            WHERE d.id = :id
            GROUP BY d.id,commentaire,i.id
            LIMIT 1;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    $result = $rs->fetch(\PDO::FETCH_ASSOC);
    if ($result === false) {
        return []; // Retourne un tableau vide si aucune donnée n'a été trouvée
    }

    return $result;
}

 function findAllByUserId(\PDO $connexion, int $id): array
{
    $sql = "SELECT u.id AS user_id, d.name AS nom_recette,ROUND(AVG(r.value),1) AS notation,CONCAT(LEFT(d.description, 100), '...') AS  description_recette,d.id AS dishes_id
            FROM dishes d
            JOIN users u ON d.user_id = u.id
            LEFT JOIN ratings r ON r.dish_id = d.id
            WHERE u.id = :id
            GROUP BY d.id
            ORDER BY d.created_at ASC;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}