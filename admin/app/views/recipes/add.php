<div class="page-header">
    <h1>AJOUT D'UNE RECETTE</h1>
</div>
<form action="recipes/create" method="post">
    <div style="display:flex; flex-direction:column; margin:0px 5px 0px 5px;">
        <label for="test">Recette</label>
        <input type="text" id="name" name="name" placeholder="Nom de la recette" />
        <label for="test">User</label>
        <select name="user_id"  class="border-2 border-black rounded-lg p-2">
            <option value="0">Choisir un user</option>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['id'] ?>"><?= $user['id'] . ' . ' . $user['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="test">Catégorie</label>
        <select name="type_id"  class="border-2 border-black rounded-lg p-2">
            <option value="0">Choisir une catégorie</option>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?= $categorie['id'] ?>"><?= $categorie['id'] . ' . ' . $categorie['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label>Description</label>
        <textarea name="description"  cols="30" rows="10"></textarea>
        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <?php foreach ($ingredients as $ingredient): ?>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="ingredient_<?php echo $ingredient['id']; ?>" name="ingredients[]
                    " value="<?php echo $ingredient['id']; ?>" >
                    <label class="form-check-label" for="ingredient<?php echo $ingredient['id']; ?>"><?php echo $ingredient['ingredientName']; ?></label>
                </div>
            <?php endforeach; ?>
        </div>
        
    </div>
    <div style="margin:5px;">
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>

