<div class="page-header">
    <h1>MODIFICATION D'UN USERS</h1>
</div>
<form  action="users/update" method="post">
    <div style="display:flex; flex-direction:column; margin:0px 5px 0px 5px;">
        <input type="hidden" name="id" value="<?= $user['id']?>"/>
        <label for="test">Picture</label>
        <input type="text" id="name" value="<?= $user['picture'] ?>" name="picture" placeholder="Name" />
        <label for="test">Name</label>
        <input type="text" id="name" value="<?= $user['name'] ?>" name="name" placeholder="Name" />
        <label for="test">Email</label>
        <input type="text" id="name " value="<?= $user['email'] ?>" name="email" placeholder="Name" />
        <label>Biography</label>
        <textarea name="biography"  cols="30" rows="10"><?=$user['biography']?></textarea>
    </div>
    <div>
        <input style="margin:5px;" type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>