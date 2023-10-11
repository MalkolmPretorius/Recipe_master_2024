<?php

namespace App\Models\NotationsModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT r.user_id 
    AS userId,
    r.dish_id AS dishesId,
    r.created_at AS createdAt,
    r.value AS notation,
    u.name AS userName,
    d.name AS dishesName
    FROM ratings r
    JOIN dishes d ON r.dish_id = d.id
    JOIN users u ON r.user_id = u.id
    ORDER BY userId ASC;";
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

function findAllDishes(\PDO $connexion): array
{
    $sql = "SELECT * 
    FROM  dishes d
    ORDER BY d.id ASC;";
$rs = $connexion->query($sql);
return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function insertOne(\PDO $connexion, array $data) : bool
{
    $sql = "INSERT INTO ratings 
            SET value = :notation,
            user_id = :user_id,
            dish_id = :dish_id,
                created_at = NOW();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':notation', $data['notation'], \PDO::PARAM_STR);
    $rs->bindValue(':user_id', $data['user_id'], \PDO::PARAM_STR);
    $rs->bindValue(':dish_id', $data['dish_id'], \PDO::PARAM_STR);
    return $rs->execute();
}

function deleteOne(\PDO $connexion, array $data) : bool
{
    $sql = "DELETE FROM ratings 
            WHERE user_Id  = :user_id
            AND dish_Id  = :dish_id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':user_id', $data['user_id'], \PDO::PARAM_STR);
    $rs->bindValue(':dish_id', $data['dish_id'], \PDO::PARAM_STR);
    return $rs->execute();
}

    function updateOne(\PDO $connexion, array $data): bool
    {
        $sql = "UPDATE ratings
                SET value = :notation,
                user_id = :user_id,
                dish_id = :dish_id
                WHERE user_Id  = :oldUserId
                AND dish_Id  = :oldDishId;";
        $rs = $connexion->prepare($sql);
        $rs->bindValue(':notation', $data['notation'], \PDO::PARAM_STR);
        $rs->bindValue(':user_id', $data['user_id'], \PDO::PARAM_INT);
        $rs->bindValue(':dish_id', $data['dish_id'], \PDO::PARAM_INT);
        $rs->bindValue(':oldUserId', $data['oldUserId'], \PDO::PARAM_INT);
        $rs->bindValue(':oldDishId', $data['oldDishId'], \PDO::PARAM_INT);
        return $rs->execute();
    }

function findOneById(\PDO $connexion, array $data)
{
    $sql = 
    "SELECT r.user_id,
            r.dish_id,
            r.value AS notation,
            u.name AS userName,
            d.name AS dishName
     FROM ratings r
     JOIN dishes d ON r.dish_id = d.id
     JOIN users u ON r.user_id = u.id
     WHERE r.user_Id  = :user_id
     AND r.dish_Id  = :dish_id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':user_id', $data['user_id'], \PDO::PARAM_INT);
    $rs->bindValue(':dish_id', $data['dish_id'], \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
    
}




