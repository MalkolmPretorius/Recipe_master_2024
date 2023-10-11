<?php

namespace App\Models\RecipesModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT d.*,d.id AS dish_id, d.name AS dish_name, u.name AS user_name, u.id AS user_id
            FROM dishes AS d
            INNER JOIN users AS u ON d.user_id = u.id
            ORDER BY id ASC;";
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

function findAllCategories(\PDO $connexion): array
{
    $sql = "SELECT * 
    FROM  types_of_dishes tod
    ORDER BY tod.id ASC;";
$rs = $connexion->query($sql);
return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function insertOne(\PDO $connexion, array $data)
{
    $sql = "INSERT INTO dishes
            SET name = :name,
            description = :description,
            user_id = :user_id,
            type_id = :type_id,
            created_at =NOW();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    $rs->bindValue(':user_id', $data['user_id'], \PDO::PARAM_STR);
    $rs->bindValue(':type_id', $data['type_id'], \PDO::PARAM_STR);
    return $rs->execute();
}

function deleteOne(\PDO $connexion, array $data) : bool
{
    $sql = "DELETE FROM dishes 
            WHERE user_Id  = :user_id
            AND id  = :dish_id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':user_id', $data['user_id'], \PDO::PARAM_STR);
    $rs->bindValue(':dish_id', $data['dish_id'], \PDO::PARAM_STR);
    return $rs->execute();
}
    function updateOne(\PDO $connexion, array $data): bool
{
    // Démarrez la transaction
    $connexion->beginTransaction();

    try {
        // Effectuez d'abord la mise à jour dans la table "dishes"
        $sqlDishes = "UPDATE dishes d
                     SET user_id = :user_id,
                     d.id = :dish_id,
                     name = :dish_name,
                     type_id = :type_id,
                     description = :description,
                     WHERE user_Id  = :oldUserId
                    AND d.id  = :oldDishId";
        $rsDishes = $connexion->prepare($sqlDishes);
        $rsDishes->bindValue(':user_id', $data['user_id'], \PDO::PARAM_INT);
        $rsDishes->bindValue(':dish_id', $data['dish_id'], \PDO::PARAM_INT);
        $rsDishes->bindValue(':dish_name', $data['dish_name'], \PDO::PARAM_INT);
        $rsDishes->bindValue(':type_id', $data['type_id'], \PDO::PARAM_INT);
        $rsDishes->bindValue(':description', $data['description'], \PDO::PARAM_INT);
        $rsDishes->bindValue(':oldUserId', $data['oldUserId'], \PDO::PARAM_INT);
        $rsDishes->bindValue(':oldDishId', $data['oldDishId'], \PDO::PARAM_INT);
        $rsDishes->execute();

        // Ensuite, mettez à jour d'autres tables selon vos besoins
        // Exemple :
        $sqlTable2 = "UPDATE ratings
                     SET value = :notation,
                     user_id = :user_id,
                     dish_id = :dish_id,
                     WHERE user_Id  = :oldUserId
                    AND dish_id  = :oldDishId;";
        $rsTable2 = $connexion->prepare($sqlTable2);
        $rsTable2->bindValue(':user_id', $data['user_id'], \PDO::PARAM_INT);
        $rsTable2->bindValue(':dish_id', $data['dish_id'], \PDO::PARAM_INT);
        $rsTable2->bindValue(':notation', $data['notation'], \PDO::PARAM_STR);  
        $rsTable2->bindValue(':oldUserId', $data['oldUserId'], \PDO::PARAM_INT);
        $rsTable2->bindValue(':oldDishId', $data['oldDishId'], \PDO::PARAM_INT);
        $rsTable2->execute();

        // Commit pour valider la transaction
        $connexion->commit();

        return true; // Tout s'est bien passé
    } catch (\Exception $e) {
        // En cas d'erreur, annulez la transaction
        $connexion->rollback();
        return false; // Une erreur s'est produite
    }
}




function findOneById(\PDO $connexion, array $data): array
{
    $sql = "SELECT   
            d.id AS dishId,
            d.description AS description,
            d.name AS dishName,
            r.value AS notation,
            u.id AS userId,
            u.name AS userName, 
            tod.id AS categoryId,
            tod.name AS categoryName
            FROM dishes d
            JOIN types_of_dishes tod ON d.type_id = tod.id
            JOIN users u ON d.user_id = u.id
            LEFT JOIN ratings r ON r.dish_id = d.id
            WHERE d.id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $data['user_id'], \PDO::PARAM_INT);
    $rs->execute();
    $result = $rs->fetch(\PDO::FETCH_ASSOC);
    return $result !== false ? $result : [];
}