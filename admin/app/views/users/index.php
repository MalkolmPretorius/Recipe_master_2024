<?php
/*
    Variables disponibles
        $users ARRAY(ARRAY(id, name, created_at))
*/
?>
<div class="page-header">
    <h1>LISTE DES USERS</h1>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>Picture</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Biographie</th>
            <th>Created_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user['id'] ?></td>
                <td><?php echo $user['picture'] ?></td>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['biography'] ?></td>
                <td><?php echo $user['created_at'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary"><a style="color:white ;"  href="users/<?php echo $user['id'] ?>/update/form">Modifier</a></button>
                    <button type="button" class="btn btn-danger"><a style="color:white ;"  href="users/<?php echo $user['id'] ?>/delete">Supprimer</a></button>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>