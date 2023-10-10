<?php
/*
    Variables disponibles
        -ingredients ARRAY(ARRAY(id, name, created_at))
*/
?>

<div class="pb-4">
    <?php foreach ($ingredients as $ingredient) : ?>
        <a class="hover:text-yellow-500  px-2 block" href="ingredients/<?php echo $ingredient['id_ingredients']; ?>/<?php echo Core\Tools\slugify($ingredient['name']); ?>">
        <?php echo $ingredient['quantité']; ?>  <?php echo $ingredient['name']; ?>
    </a>
    <?php endforeach; ?>
</div>