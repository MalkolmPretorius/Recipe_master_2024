<?php
/*
    Variables disponibles
        - $recipes (ARRAY(ARRAY(...)))
        - $chefs (ARRAY(ARRAY(...)))
        - $featuredRecipe (ARRAY(ARRAY(...)))
*/
?>
<?php include '../app/views/featuredRecipes/_index.php'; ?>

<h2 class="text-2xl font-bold mb-4">Recettes populaires</h2>
<?php include '../app/views/recipes/_index.php'; ?>

<?php include '../app/views/chefs/_index.php'; ?>