<div class="page-header">
    <h1>MODIFICATION D'UNE RECETTE</h1>
</div>
<form  action="recipes/update" method="post">
<div style="display:flex; flex-direction:column; margin:0px 5px 0px 5px;">
<input type="hidden" name="oldUserId" value="<?= $recipe['userId'] ?>" />
<input type="hidden" name="oldDishId" value="<?= $recipe['dishId'] ?>" />
<label for="test">Recette</label>
        <input type="hidden" name="dish_id" value="<?= $recipe['dishId'] ?>" />
        <input type="text" id="name" name="dish_name" value="<?= $recipe['dishName'] ?>" placeholder="Nom de la recette" />
        <label for="test">User</label>
        <select name="user_id"  class="border-2 border-black rounded-lg p-2">
            <option value="<?= $recipe['userId'] ?>"><?= $recipe['userName'] ?></option>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['id'] ?>"><?= $user['id'] . ' . ' . $user['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="test">Catégorie</label>
        <select name="type_id"  class="border-2 border-black rounded-lg p-2">
            <option value="<?= $recipe['categoryId'] ?>"><?= $recipe['categoryName'] ?></option>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?= $categorie['id'] ?>"><?= $categorie['id'] . ' . ' . $categorie['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label>Description</label>
        <textarea name="description"  cols="30" rows="10"><?=$recipe['description']?></textarea>
        <label for="test">Notation</label>
        <input type="text" id="name" name="notation" value="<?= $recipe['notation'] ?>" placeholder="Notation" />
    </div>
    <div style="margin:5px;">
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>