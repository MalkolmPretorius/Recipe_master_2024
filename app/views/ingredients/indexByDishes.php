<?php
/*
    Variables disponibles
        -ingredients ARRAY(ARRAY(id, name, created_at))
*/
?>

<div class="pb-4">
    <?php foreach ($ingredients as $ingredient) : ?>
        <a class="hover:text-yellow-500  px-2 block" href="categories/<?php echo $ingredient  ['id']; ?>/<?php echo Core\Tools\slugify($ingredient['name']); ?>">
            <?php echo $ingredient['name']; ?>
    </a>
    <?php endforeach; ?>
</div>