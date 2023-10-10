<?php

namespace App\Models\NotationsModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT r.value AS notation
            FROM ratings r
            ORDER BY notation ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}