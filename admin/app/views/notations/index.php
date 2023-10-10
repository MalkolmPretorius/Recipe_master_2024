<?php
/*
    Variables disponibles
        $ingredients ARRAY(ARRAY(id, name, created_at))
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
                <td></td>
                <td></td>
                <td><?php echo $notation['notation'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary">Modifier</button>
                    <button type="button" class="btn btn-danger">Supprimer</button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>