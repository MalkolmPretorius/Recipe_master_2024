<?php

namespace App\Models\UsersModel;

function findOneByLoginPassword(\PDO $connexion, array $data = null) : array
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

function insertOne(\PDO $connexion, array $data) : bool
{
    $sql = "INSERT INTO users
            SET name = :name,
            email = :email,
            password = :password,
            picture = :picture,
            biography = :biography,
                created_at = NOW();";
    $rs = $connexion->prepare($sql);
    $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':email', $data['email'], \PDO::PARAM_STR);
    $rs->bindValue(':password', $hashedPassword, \PDO::PARAM_STR);
    $rs->bindValue(':picture', $data['picture']['name'], \PDO::PARAM_STR);
    $rs->bindValue(':biography', $data['biography'], \PDO::PARAM_STR);
    return $rs->execute();
}

function deleteOne(\PDO $connexion, int $id) : bool
{
    $sql = "DELETE FROM users 
            WHERE id  = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_STR);
    return $rs->execute();
}

function updateOne(\PDO $connexion, array $data) : bool
{
    $sql = "UPDATE users
            SET name = :name,
            email = :email,
            password = :password,
            picture =:picture,
            biography = :biography
            WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':email', $data['email'], \PDO::PARAM_STR);
    $rs->bindValue(':password', $hashedPassword, \PDO::PARAM_STR);
    $rs->bindValue(':biography', $data['biography'], \PDO::PARAM_STR);
    $rs->bindValue(':picture', $data['picture'], \PDO::PARAM_STR);
    $rs->bindValue(':id',$data['id'], \PDO::PARAM_STR);
    return $rs->execute();
}

function findOneById(\PDO $connexion, int $id) : array
{
    $sql = "SELECT *
            FROM  users
            WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}