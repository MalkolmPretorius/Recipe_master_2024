<main class="w-full md:w-3/4 p-3">

          <!-- User Main Content -->
          <!-- Main content -->
          <div class=" p-3">
            <!-- Hero User Profile -->
            <section class="relative mb-6">
              <img
                class="w-full h-96 object-cover"
                src="../../../documents/pictures/<?php echo $chef['picture']?>"
                alt="User Profile Image"
              />
              <div
                class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent"
              >
                <h1 class="text-3xl font-bold mb-2 text-white">
                <?php echo $chef['nom_utilisateur']?>
                </h1>
                <p class="text-gray-300 mb-4">
                <?php echo $chef['biographie']?>
                </p>
              </div>
            </section>

            <!-- User's Recipes -->
            <section>
              <h2 class="text-2xl font-bold mb-4">Mes recettes</h2>
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Recipe Card -->
                
              <?php include_once '../app/views/chefs/recipes.php'; ?>
                <!-- ... (autres cartes de recettes de l'utilisateur) ... -->
              </div>
            </section>
          </div>
        </div>
      </main>