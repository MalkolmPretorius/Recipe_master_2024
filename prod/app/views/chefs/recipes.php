<?php foreach ($userRecipes as $userRecipe) : ?>
<article
                  class="bg-white rounded-lg overflow-hidden shadow-lg relative"
                >
                  <img
                    src="https://source.unsplash.com/480x360/?recipe"
                    alt="Recipe Image"
                    class="w-full h-48 object-cover"
                  />
                  <div class="p-4">
                    <h3 class="text-xl font-bold mb-2"><?php echo $userRecipe['nom_recette'] ?></h3>
                    <div class="flex items-center mb-2">
                      <span class="text-yellow-500 mr-1"
                        ><i class="fas fa-star"></i
                      ></span>
                      <span><?php echo $userRecipe['notation'] ?></span>
                    </div>
                    <p class="text-gray-600">
                    <?php echo Core\Tools\truncate($userRecipe['description_recette']);?>
                    </p>
                    <a
                      href="recipes/<?php echo $userRecipe['dishes_id']; ?>/<?php echo Core\Tools\slugify($userRecipe['nom_recette']);?>"
                      class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
                      >Voir la recette</a
                    >
                  </div>
                </article>
                <?php endforeach; ?>