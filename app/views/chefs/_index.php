<section class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">
<?php foreach ($chefs as $chef) : ?>
          <!-- chef Info -->
          <div class="flex items-center mb-6">
          
            <!-- chef Avatar -->
            <img
              src="https://source.unsplash.com/300x300/?portrait"
              alt="Nom de l'utilisateur"
              class="w-24 h-24 rounded-full border-4 border-yellow-500 mr-4"
            />

            <!-- chef Details -->
            <div>
              <h3 class="text-2xl font-bold"><?php echo $chef['nom_utilisateur'] ?></h3>
              <p class="text-gray-400">Membre depuis: <?php echo $chef['date_creation_utilisateur'] ?></p>
              <p class="text-gray-400">Nombre de recettes postées: <?php echo $chef['nombre_de_recettes'] ?></p>
            </div>
          </div>

          <!-- chef Actions -->
          <div class="flex justify-between items-center mb-4">
            <a
              href="chef_recipes.html"
              class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-full px-6 py-2"
              >Voir mes recettes</a
            >
          </div>

          <!-- chef's Latest Recipes -->
          <div>
            <h4
              class="text-xl font-bold mb-4 border-b-2 border-yellow-500 pb-2"
            >
              Mes dernières recettes
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
              <!-- Recipe Card (Repeat for each recipe) -->
              <?php include_once '../app/views/chefs/lastRecipes.php'; ?>
              
            </div>
            
          </div>
          <?php endforeach; ?>
        </section>