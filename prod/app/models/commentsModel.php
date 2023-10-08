<?php  

namespace App\Models\CommentsModel;

function findAllByDishesId(\PDO $connexion, int $id): array
{
    $sql = "SELECT *
            FROM comments c
            JOIN  dishes d ON c.dish_id = d.id
            WHERE d.id = :id
            ORDER BY d.id ASC;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllByUsersId(\PDO $connexion, int $id): array
{
    $sql = "SELECT u.name AS auteur_recette, u.picture AS picture, c.content AS commentaire
            FROM comments c
            JOIN  users u ON c.user_id = u.id
            JOIN dishes d ON c.dish_id = d.id
            WHERE d.id = :id
            ORDER BY c.created_at DESC;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}