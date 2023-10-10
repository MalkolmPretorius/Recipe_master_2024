<div class="page-header">
    <h1>MODIFICATION D'UN USERS</h1>
</div>
<form action="users/update" method="post" enctype="multipart/form-data">
    <div style="display:flex; flex-direction:column; margin:0px 5px 0px 5px;">
        <input type="hidden" name="id" value="<?= $user['id'] ?>" />
        <input type="hidden" name="password" value="<?= $user['password'] ?>" />
        <label for="test">Picture</label>
        <img src="../../prod/documents/pictures/<?= $user['picture'] ?>" style="height:250px; width:250px;">
        <input type="file" value="<?= $user['picture'] ?>" name="new_picture" placeholder="Name" />
        <input type="hidden" name="old_picture" value="<?= $user['picture'] ?>" />
        <label for="test">Name</label>
        <input type="text" value="<?= $user['name'] ?>" name="name" placeholder="Name" />
        <label for="test">Email</label>
        <input type="text" value="<?= $user['email'] ?>" name="email" placeholder="Name" />
        <label>Biography</label>
        <textarea name="biography" cols="30" rows="10"><?= $user['biography'] ?></textarea>
    </div>
    <div>
        <input style="margin:5px;" type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>