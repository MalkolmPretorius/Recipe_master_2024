<div class="page-header">
    <h1>MODIFICATION D'UNE RECETTE</h1>
</div>
<form action="recipes/update" method="post">
    <div style="display:flex; flex-direction:column; margin:0px 5px 0px 5px;">
        <input type="hidden" name="oldUserId" value="<?= $recipe['userId'] ?>" />
        <input type="hidden" name="dish_id" value="<?= $recipe['dishId'] ?>" />
        <?php
            var_dump($recipe['dishId']);
        ?>
        <label for="test">Recette</label>
        <input type="text" id="name" name="dish_name" value="<?= $recipe['dishName'] ?>" placeholder="Nom de la recette" />
        <label for="test">User</label>
        <select name="user_id" class="border-2 border-black rounded-lg p-2">
            <option value="<?= $recipe['userId'] ?>"><?= $recipe['userName'] ?></option>
            <?php foreach ($users as $user) : ?>
                <option value="<?= $user['id'] ?>"><?= $user['id'] . ' . ' . $user['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label for="test">Catégorie</label>
        <select name="type_id" class="border-2 border-black rounded-lg p-2">
            <option value="<?= $recipe['categoryId'] ?>"><?= $recipe['categoryName'] ?></option>
            <?php foreach ($categories as $categorie) : ?>
                <option value="<?= $categorie['id'] ?>"><?= $categorie['id'] . ' . ' . $categorie['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <label>Description</label>
        <textarea name="description" cols="30" rows="10"><?= $recipe['description'] ?></textarea>
        <div class="form-group">
            <?php
            if (!empty($recipeIngredients)) {
                echo '<h3>Ingredients déjà dans la recette</h3>';
                foreach ($recipeIngredients as $recipeIngredient) {
            ?>
                    <div style="display:flex;">
                        <input type="checkbox" name="ingredient_ids[]" id="ingredient_<?php echo $recipeIngredient['ingredientID']; ?>" value="<?php echo $recipeIngredient['ingredientID']; ?>" checked>
                        <label for="ingredient_<?php echo $recipeIngredient['ingredientID']; ?>">
                            <?php echo $recipeIngredient['ingredientName'];
                            echo $recipeIngredient['ingredientID']; ?>
                        </label>
                    </div>
            <?php
                }
            }
            ?>
            <h3>Ingredients à Ajouter</h3>
            <?php foreach ($ingredients as $ingredient) : ?>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="ingredient_<?php echo $ingredient['id']; ?>" name="ingredients[]" value="<?php echo $ingredient['id']; ?>" <?= $ingredient['id'] == $recipe['dishId'] ? 'checked' : '' ?> />
                    <label class="form-check-label" for="ingredient<?php echo $ingredient['id']; ?>"><?php echo $ingredient['ingredientName']; ?></label>
                    <?php
                        echo $ingredient['id'];
                    ?>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <div style="margin:5px;">
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>