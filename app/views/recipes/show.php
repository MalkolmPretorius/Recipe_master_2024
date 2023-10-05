
<main class="w-full md:w-3/4 p-3">

        <!-- Recipe Detail -->
        <section class="bg-white rounded-lg shadow-lg p-6 mb-6">
          <!-- Recipe Image -->
          <img
            class="w-full h-96 object-cover rounded-t-lg"
            src="https://source.unsplash.com/1600x900/?recipe"
            alt="Nom de la recette"
          />

          <!-- Recipe Info -->
          <div class="p-4">
            <h1 class="text-3xl font-bold mb-4"><?php echo $recipe['nom_recette'] ?></h1>
            <div class="flex items-center mb-4">
              <span class="text-yellow-500 mr-1"
                ><i class="fas fa-star"></i
              ></span>
              <span></i> <?php echo $recipe['notation'] ?></span>
              <span class="ml-4 text-gray-700"
                ><i class="fas fa-clock"></i> <?php echo $recipe['temps_preparation'] ?></span
              >
            </div>
            <p class="text-gray-700 mb-4">
            <?php echo $recipe['description_recette'] ?>
            </p>
            <div class="flex items-center mb-4">
              <span class="text-gray-700 mr-2">Par <?php echo $recipe['auteur_recette'] ?></span>
              <span class="text-gray-500"
                ><i class="fas fa-comment"></i> <?php echo $recipe['nombre_commentaires'] ?> commentaires</span
              >
            </div>
          </div>

          <!-- Ingredients -->
          <div class="p-4 border-t">
            <h2 class="text-2xl font-bold mb-4">Ingrédients</h2>
            <ul class="list-disc pl-5">
               
            <?php
                include_once '../app/models/ingredientsModel.php';
                $ingredients = \App\Models\IngredientsModel\findAllByDishesId($connexion, $recipe['id']);
                include '../app/views/ingredients/indexByDishes.php';
                ?>
              <!-- ... (autres ingrédients) ... -->
            </ul>
          </div>

          <!-- Steps -->
          <div class="p-4 border-t">
            <h2 class="text-2xl font-bold mb-4">Étapes</h2>
            <ol class="list-decimal pl-5">
              <li>Préchauffez le four à 180°C.</li>
              <li>Dans un saladier, mélangez la farine et le sucre.</li>
              <li>
                Ajoutez les œufs un à un en mélangeant bien entre chaque ajout.
              </li>
              <!-- ... (autres étapes) ... -->
            </ol>
          </div>

          <!-- Comments -->
          <div class="p-4 border-t">
            <h2 class="text-2xl font-bold mb-4">Commentaires</h2>
            <!-- Comment -->
            <div class="mb-4">
              <div class="flex items-center mb-2">
                <img
                  src= "../documents/pictures/<?php echo $recipe['picture']?>"
                  
                  alt="Nom de l'utilisateur"
                  class="w-10 h-10 rounded-full mr-2"
                />
                <span class="font-bold"><?php echo $recipe['auteur_recette'] ?></span>
              </div>
              <p class="text-gray-700">
              <?php
                include_once '../app/models/commentsModel.php';
                $comments = \App\Models\CommentsModel\findAllByDishesId($connexion, $recipe['id']);
                include '../app/views/comments/_index.php';
                ?>
              </p>
            </div>
            <!-- ... (autres commentaires) ... -->
          </div>
        </section>
      </main>