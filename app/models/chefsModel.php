<?php

namespace App\Models\ChefsModel;

function findAllPopulars(\PDO $connexion): array
{
    $sql = "SELECT u.id AS id,u.name AS nom_utilisateur,u.created_at AS date_creation_utilisateur,COUNT(d.id) AS nombre_de_recettes,AVG(r.value) AS notation_moyenne,u.picture AS image_utilisateur
            FROM users u
            LEFT JOIN dishes d ON u.id = d.user_id
            LEFT JOIN ratings r ON d.id = r.dish_id
            GROUP BY u.id, u.name, u.created_at
            ORDER BY notation_moyenne DESC
            LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAll(\PDO $connexion): array
{
    $sql = "SELECT u.id AS id,u.name AS nom_utilisateur,u.created_at AS date_creation_utilisateur,COUNT(d.id) AS nombre_de_recettes,AVG(r.value) AS notation_moyenne,u.picture AS image_utilisateur
            FROM users u
            LEFT JOIN dishes d ON u.id = d.user_id
            LEFT JOIN ratings r ON d.id = r.dish_id
            GROUP BY u.id, u.name, u.created_at
            ORDER BY notation_moyenne DESC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, int $id): array
{
    $sql = "SELECT u.id,u.name AS nom_utilisateur, u.biography AS biographie, u.picture AS picture
            FROM users u
            WHERE u.id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

