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
        <label for="test">Notation</label>
        <input type="text" id="name" name="notation" placeholder="Notation" />
        
    </div>
    <div style="margin:5px;">
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>

