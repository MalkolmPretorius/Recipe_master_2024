<div class="page-header">
    <h1>AJOUT D'UNE NOTATION</h1>
</div>
<form action="notations/create" method="post">
    <div style="display:flex; flex-direction:column; margin:0px 5px 0px 5px;">
        <label for="test">User</label>
        <select name="user_id"  class="border-2 border-black rounded-lg p-2">
            <option value="0">Choisir un user</option>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['id'] ?>"><?= $user['id'] . ' . ' . $user['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="test">Dish</label>
        <select name="dish_id"  class="border-2 border-black rounded-lg p-2">
            <option value="0">Choisir une recettes</option>
            <?php foreach ($dishes as $dishe): ?>
                <option value="<?= $dishe['id'] ?>"><?= $dishe['id'] . ' . ' . $dishe['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="test">Notation</label>
        <input type="text" id="name" name="notation" placeholder="notation" />
        
    </div>
    <div style="margin:5px;">
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>

