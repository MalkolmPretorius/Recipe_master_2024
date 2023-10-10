<?php

namespace App\Controllers\NotationsController;

use \App\Models\NotationsModel;

include_once '../app/models/notationsModel.php';


function indexNotationsAction(\PDO $connexion): void
{
    // Je mets le findAll() dans $notations
    $notations = NotationsModel\findAll($connexion);

    // Je charge la vue notations.index dans $content
    global $title, $content1;
    $title = "Liste des notations";
    ob_start();
    include '../app/views/notations/index.php';
    $content1 = ob_get_clean();
}

function addNotationsAction(\PDO $connexion): void
{
    $users = NotationsModel\findAllUsers($connexion);
    $dishes = NotationsModel\findAllDishes($connexion);
    // Je charge la vue notations.add dans $content
    global $title, $content1;
    $title = "Ajouter un notations";
    ob_start();
    include '../app/views/notations/add.php';
    $content1 = ob_get_clean();
}

function createNotationsAction(\PDO $connexion, array $data)
{
    $notations = NotationsModel\insertOne($connexion, $data);
    header('location: ' . ADMIN_ROOT  . 'notations');
}

function deleteNotationsAction(\PDO $connexion, array $data): void
{
    $notations = NotationsModel\deleteOne($connexion, $data);
    header('location: ' . ADMIN_ROOT  . 'notations');
}

function updateNotationsAction(\PDO $connexion, array $data): void
{
    $notations = NotationsModel\updateOne($connexion, $data);
    header('location: ' . ADMIN_ROOT  . 'notations');
}

function updateNotationFormAction(\PDO $connexion, array $data): void
{
    $notation = NotationsModel\findOneById($connexion, $data);
    $users = NotationsModel\findAllUsers($connexion);
    $dishes = NotationsModel\findAllDishes($connexion);

    global $title, $content1;
    $title = "Modifier une notation";
    ob_start();
    include '../app/views/notations/updateNotationForm.php';
    $content1 = ob_get_clean();
}
