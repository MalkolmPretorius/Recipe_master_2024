<div class="page-header">
    <h1>MODIFICATION D'UNE NOTATION</h1>
</div>
<form  action="notations/update" method="post">
<div style="display:flex; flex-direction:column; margin:0px 5px 0px 5px;">
<input type="hidden" name="oldUserId" value="<?= $notation['user_id'] ?>" />
<input type="hidden" name="oldDishId" value="<?= $notation['dish_id'] ?>" />
        <label for="test">User</label>
        <select name="user_id"  class="border-2 border-black rounded-lg p-2">
            <option value="<?= $notation['user_id'] ?>"><?= $notation['userName'] ?></option>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['id'] ?>"><?= $user['id'] . ' . ' . $user['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="test">Dish</label>
        <select name="dish_id"  class="border-2 border-black rounded-lg p-2">
            <option value="<?= $notation['dish_id'] ?>"><?= $notation['dishName'] ?></option>
            <?php foreach ($dishes as $dish): ?>
                <option value="<?= $dish['id'] ?>"><?= $dish['id'] . ' . ' . $dish['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="test">Notation</label>
        <input type="text" id="name" name="notation" value="<?= $notation['notation'] ?>" placeholder="notation" />
        
    </div>
    <div style="margin:5px;">
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>