<?php
/*
    Variables disponibles
        -comments ARRAY(ARRAY(id, name, created_at))
*/
?>

<div class="pb-4">
    <?php foreach ($comments as $comment) : ?>
        <span class="hover:text-yellow-500  px-2 block">
            <?php echo $comment['content']; ?>
    </span>
    <?php endforeach; ?>
</div>