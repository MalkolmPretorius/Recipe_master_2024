<?php

namespace App\Controllers\CategoriesController;

use \App\Models\CategoriesModel;

include_once '../app/models/categoriesModel.php';


function indexCategoriesAction(\PDO $connexion)
{
    // Je mets le findAll() dans $categories
    $categories = CategoriesModel\findAll($connexion);

    // Je charge la vue categories.index dans $content
    global $title, $content1;
    $title = "Liste des catégories";
    ob_start();
    include '../app/views/categories/index.php';
    $content1 = ob_get_clean();
}

function addCategoriesAction()
{
    // Je charge la vue categories.add dans $content
    global $title, $content1;
    $title = "Ajouter une catégorie";
    ob_start();
    include '../app/views/categories/add.php';
    $content1 = ob_get_clean();
}

function createCategoriesAction(\PDO $connexion, array $data)
{
    $categorie = CategoriesModel\insertOne($connexion, $data);
    header('location: ' . ADMIN_ROOT  . 'categories');
}

function deleteCategoriesAction(\PDO $connexion, int $id)
{
    $categorie = CategoriesModel\deleteOne($connexion, $id);
    header('location: ' . ADMIN_ROOT  . 'categories');
}

function updateCategoriesAction(\PDO $connexion, array $data)
{
    $categorie = CategoriesModel\updateOne($connexion, $data);
    header('location: ' . ADMIN_ROOT  . 'categories');
}

function updateCategoryFormAction(\PDO $connexion, int $id)
{
    $category = CategoriesModel\findOneById($connexion, $id);

    global $title, $content1;
    $title = "Modifier une catégorie";
    ob_start();
    include '../app/views/categories/updateCategoryForm.php';
    $content1 = ob_get_clean();
}
