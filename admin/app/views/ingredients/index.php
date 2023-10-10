<?php
/*
    Variables disponibles
        $ingredients ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES INGREDIENTS</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ingredients as $ingredient) : ?>
            <tr>
                <td><?php echo $ingredient['id'] ?></td>
                <td><?php echo $ingredient['name'] ?></td>
                <td><?php echo $ingredient['created_at'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary"><a style="color:white ;"  href="ingredients/<?php echo $ingredient['id'] ?>/update/form">Modifier</a></button>
                    <button type="button" class="btn btn-danger"><a style="color:white ;"  href="ingredients/<?php echo $ingredient['id'] ?>/delete">Supprimer</a></button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>