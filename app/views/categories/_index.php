<?php foreach ($categories as $category) : ?>
        <li>
            <a class="hover:text-white hover:bg-yellow-700 px-2 block" href="categories/<?php echo $category['id']; ?>/<?php echo Core\Tools\slugify($category['name']); ?>">
                <?php echo $category['name']; ?>
            </a>
        </li>
    <?php endforeach; ?>
    <li>
             