
<div class="p-4 border-t">
            <h2 class="text-2xl font-bold mb-4">Commentaires</h2>
            <!-- Comment -->
            <?php foreach ($userComments as $userComment) : ?>
                <div class="border-t pt-2">
            <div class="mb-4">
              <div class="flex items-center mb-2">
                <img
                  src= "../documents/pictures/<?php echo $userComment['picture']?>"
                  
                  alt="Nom de l'utilisateur"
                  class="w-10 h-10 rounded-full mr-2"
                />
                <span class="font-bold"><?php echo $userComment['auteur_recette'] ?></span>
              </div>
              <p class="text-gray-700">
              <?php echo $userComment['commentaire'] ?>
              </p>
              </div>
              <?php endforeach; ?>
            </div>
            