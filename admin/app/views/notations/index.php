<?php
/*
    Variables disponibles
        $notations ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES NOTATIONS</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id/Users</th>
            <th>id/Recipes</th>
            <th>Notations</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($notations as $notation) : ?>
            <tr>
                <td><?= $notation['userId'] ?>.<?= $notation['userName'] ?></td>
                <td><?= $notation['dishesId'] ?>.<?= $notation['dishesName'] ?></td> 
                <td><?= $notation['notation'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary"><a style="color:white ;"  href="notations/<?= $notation['userId']?>/<?= $notation['dishesId'] ?>/update/form">Modifier</a></button>
                    <button type="button" class="btn btn-danger"><a style="color:white ;"  href="notations/<?= $notation['userId']?>/<?= $notation['dishesId'] ?>/delete">Supprimer</a></button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>