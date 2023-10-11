<?php
/*
    Variables disponibles
        $recipes ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES RECETTES</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id/Users</th>
            <th>id/Recipes</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recipes as $recipe) : ?>
            <tr>
                <td><?= $recipe['user_id'] ?>.<?= $recipe['user_name'] ?></td>
                <td><?= $recipe['dish_id'] ?>.<?= $recipe['dish_name'] ?></td>
                <td style="width:700px;"><?= $recipe['description'] ?></td>  
                <td>
                    <button type="button" class="btn btn-primary"><a style="color:white ;"  href="recipes/<?= $recipe['dish_id']?>/<?= $recipe['user_id'] ?>/update/form">Modifier</a></button>
                    <button type="button" class="btn btn-danger"><a style="color:white ;"  href="recipes/<?= $recipe['user_id']?>/<?= $recipe['dish_id'] ?>/delete">Supprimer</a></button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>