<?php

namespace App\Models\UsersModel;

function findOneByLoginPassword(\PDO $connexion, array $data = null)
{
    $sql = "SELECT *
            FROM users
            WHERE pseudo = :login
            AND password = :pwd;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':login', $data['login'], \PDO::PARAM_STR);
    $rs->bindValue(':pwd', $data['pwd'], \PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}

