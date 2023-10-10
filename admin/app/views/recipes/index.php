<?php
/*
    Variables disponibles
        $recipes ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES RECIPES</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <
            <th>id/Recipes</th>
            <th>recipes</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recipes as $recipe) : ?>
            <tr>
                <td></td>
                <td><?= $recipe['id'] ?>.<?= $recipe['name'] ?></td> 
                <td></td>
                <td>
                    <button type="button" class="btn btn-primary"><a style="color:white ;"  href="recipes/<?= $recipe['id']?>/update/form">Modifier</a></button>
                    <button type="button" class="btn btn-danger"><a style="color:white ;"  href="recipes/<?= $recipe['id']?>/delete">Supprimer</a></button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>