<?php

namespace App\Models\IngredientsModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT *
            FROM ingredients
            ORDER BY id ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function insertOne(\PDO $connexion, array $data)
{
    $sql = "INSERT INTO ingredients
            SET name = :name,
                created_at = NOW();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    return $rs->execute();
}

function deleteOne(\PDO $connexion, int $id)
{
    $sql = "DELETE FROM ingredients 
            WHERE id  = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_STR);
    return $rs->execute();
}

function updateOne(\PDO $connexion, array $data)
{
    $sql = "UPDATE ingredients
            SET name = :name
            WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':id',$data['id'], \PDO::PARAM_STR);
    return $rs->execute();
}

function findOneById(\PDO $connexion, int $id)
{
    $sql = "SELECT *
            FROM  ingredients
            WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}