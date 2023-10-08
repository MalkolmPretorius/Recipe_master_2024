<?php foreach ($lastRecipes as $lastRecipe) : ?>
<article
                class="bg-gray-800 rounded-lg overflow-hidden shadow-lg relative"
              >
                <img
                  src="https://source.unsplash.com/480x360/?recipe"
                  alt="Recipe Name"
                  class="w-full h-48 object-cover"
                />
                <div class="p-4">
                  <h5 class="text-lg font-bold mb-2"><?php echo $lastRecipe['nom_recette'] ?></h5>
                  <div class="flex items-center mb-2">
                    <span class="text-yellow-500 mr-1"
                      ><i class="fas fa-star"></i
                    ></span>
                    <span><?php echo $lastRecipe['notation'] ?></span>
                  </div>
                  <p class="text-gray-500">
                  <?php echo Core\Tools\truncate($recipe['description_recette']);?>
                  </p>
                  <a
                    href="recipes/<?php echo $lastRecipe['id']; ?>/<?php echo Core\Tools\slugify($lastRecipe['nom_recette']);?>"
                    class="text-yellow-500 hover:text-yellow-600 mt-2 inline-block"
                    >Voir la recette</a
                  >
                </div>
              </article>
              <?php endforeach; ?>