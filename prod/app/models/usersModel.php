<?php

namespace App\Models\UsersModel;

function findOneByLoginPassword(\PDO $connexion, array $data)
{
    $sql = "SELECT *
            FROM users
            WHERE name = :login;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':login', $data['login'], \PDO::PARAM_STR);
    
    $rs->execute();

    return $rs->fetch(\PDO::FETCH_ASSOC);
}
