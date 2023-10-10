<?php

namespace App\Models\UsersModel;

function findOneByLoginPassword(\PDO $connexion, array $data = null)
{
    $sql = "SELECT *
            FROM users
            WHERE name = :login
            AND password = :pwd;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':login', $data['login'], \PDO::PARAM_STR);
    $rs->bindValue(':pwd', $data['pwd'], \PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}


function findAll(\PDO $connexion): array
{
    $sql = "SELECT * 
            FROM  users u
            ORDER BY u.id ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function insertOne(\PDO $connexion, array $data)
{
    $sql = "INSERT INTO users
            SET name = :name,
                created_at = NOW();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    return $rs->execute();
}

function deleteOne(\PDO $connexion, int $id)
{
    $sql = "DELETE FROM users 
            WHERE id  = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_STR);
    return $rs->execute();
}

function updateOne(\PDO $connexion, array $data)
{
    $sql = "UPDATE users
            SET name = :name,
            email = :email,
            biography = :biography
            WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':email', $data['email'], \PDO::PARAM_STR);
    $rs->bindValue(':biography', $data['biography'], \PDO::PARAM_STR);
    $rs->bindValue(':id',$data['id'], \PDO::PARAM_STR);
    return $rs->execute();
}

function findOneById(\PDO $connexion, int $id)
{
    $sql = "SELECT *
            FROM  users
            WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}