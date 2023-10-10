<?php

namespace App\Controllers\UsersController;

use \App\Models\UsersModel;
include_once '../app/models/usersModel.php';

function dashboardAction(\PDO $connexion)
{
    
    global $content1, $title;
    $title = "Users";
    ob_start();
    include '../app/views/users/dashboard.php';
    $content1 = ob_get_clean();
}
function logoutAction(\PDO $connexion)
{
    unset($_SESSION['user']);
    header('location: ' . ROOT_PUBLIC);
}


function indexUsersAction(\PDO $connexion)
{
    // Je mets le findAll() dans $users
    $users = UsersModel\findAll($connexion);

    // Je charge la vue users.index dans $content
    global $title, $content1;
    $title = "Liste des Users";
    ob_start();
    include '../app/views/users/index.php';
    $content1 = ob_get_clean();
}
function addUsersAction()
{
    // Je charge la vue users.add dans $content
    global $title, $content1;
    $title = "Ajouter un users";
    ob_start();
    include '../app/views/users/add.php';
    $content1 = ob_get_clean();
}

function createUsersAction(\PDO $connexion, array $data)
{
    $users = UsersModel\insertOne($connexion, $data);
    header('location: ' . ADMIN_ROOT  . 'users');
}

function deleteUsersAction(\PDO $connexion, int $id)
{
    $users = UsersModel\deleteOne($connexion, $id);
    header('location: ' . ADMIN_ROOT  . 'users');
}

function updateUsersAction(\PDO $connexion, array $data)
{
    $users = UsersModel\updateOne($connexion, $data);
    header('location: ' . ADMIN_ROOT  . 'users');
}

function updateUserFormAction(\PDO $connexion, int $id)
{
    $user = UsersModel\findOneById($connexion, $id);

    global $title, $content1;
    $title = "Modifier un users";
    ob_start();
    include '../app/views/users/updateUserForm.php';
    $content1 = ob_get_clean();
}
