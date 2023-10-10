<?php
/*
    Variables disponibles
        $categories ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES CATEGORIES</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category) : ?>
            <tr>
                <td><?php echo $category['id'] ?></td>
                <td><?php echo $category['name'] ?></td>
                <td><?php echo $category['description'] ?></td>
                <td><?php echo $category['created_at'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary"><a style="color:white ;"  href="categories/<?php echo $category['id'] ?>/update/form">Modifier</a></button>
                    <button type="button" class="btn btn-danger"><a style="color:white ;"  href="categories/<?php echo $category['id'] ?>/delete">Supprimer</a></button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>