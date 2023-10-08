<?php foreach ($ingredients as $ingredient) : ?>
        <li>
            <a class="hover:text-white hover:bg-yellow-700 px-2 block" href="ingredients/<?php echo $ingredient  ['id']; ?>/<?php echo Core\Tools\slugify($ingredient['name']); ?>">
                <?php echo $ingredient['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
    <li>