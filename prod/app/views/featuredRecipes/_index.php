

<section class="relative mb-6">
<?php foreach ($randomRecipes as $randomRecipe) : ?>
          <img
            class="w-full h-96 object-cover"
            src="https://source.unsplash.com/1600x900/?recipe"
            alt="Featured Recipe Image"
          />
          <div
            class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent"
          >
            <h1 class="text-3xl font-bold mb-2 text-white">
              <?php echo $randomRecipe['nom_recette'] ?>
            </h1>
            <div class="flex items-center mb-4">
              <span class="text-yellow-500 mr-1"
                ><i class="fas fa-star"></i
              ></span>
              <span class="text-white"><?php echo $randomRecipe['notation'] ?></span>
            </div>
            <p class="text-white mb-4">
            <?php echo $randomRecipe['nom_recette'] ?>
            </p>
            <div class="flex items-center mb-4">
              <span class="text-white mr-2">Par <?php echo $randomRecipe['auteur'] ?></span>
              <span class="text-white"
                ><i class="fas fa-comment"></i><?php echo $randomRecipe['nombre_commentaires'] ?> commentaires</span
              >
            </div>
            <a
              href="recipes/<?php echo $randomRecipe['id']; ?>/<?php echo Core\Tools\slugify($randomRecipe['nom_recette']);?>"
              class="inline-block bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
            >
              Voir la recette
            </a>
          </div>
          <?php endforeach; ?>
        </section>