<div class="page-header">
    <h1>MODIFICATION D'UN INGREDIENT</h1>
</div>
<form  action="ingredients/update" method="post">
    <div style="display:flex; flex-direction:column; margin:0px 5px 0px 5px;">
        <input type="hidden" name="id" value="<?= $ingredient['id']?>"/>
        <label for="test">Name</label>
        <input type="text" id="name" value="<?= $ingredient['name'] ?>" name="name" placeholder="Name" />
    </div>
    <div>
        <input style="margin:5px;" type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>