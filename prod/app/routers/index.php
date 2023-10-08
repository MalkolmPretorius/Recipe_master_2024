<?php  
if(isset($_GET['hash'])):
    $sql = "SELECT *
            FROM users;";
    $rs = $connexion->query($sql);
    $passwords=  $rs->fetchAll(\PDO::FETCH_ASSOC);

    foreach ($passwords as $password):
        $sql ="UPDATE users
                SET password = :hashed_password
                WHERE id = :id;";
        $rs = $connexion->prepare($sql);
        $rs->bindValue(':hashed_password', password_hash($password['password'], PASSWORD_DEFAULT), \PDO::PARAM_STR);
        $rs->bindValue(':id',$password['id'], \PDO::PARAM_STR);
        $rs->execute();
    endforeach;
    echo 'Hacheage réussi !';
// ROUTER PRINCIPAL

// Route des Users
// PATTERN: ?users=loginForm
// CTRL: usersController
// ACTION: loginForm
elseif (isset($_GET['users'])) :
    include_once '../app/routers/users.php';
    
elseif(isset($_GET['recipes'])) :
    include_once '../app/routers/recipes.php';

elseif(isset($_GET['chefs'])) :
    include_once '../app/routers/chefs.php';

elseif(isset($_GET['categories'])) :
    include_once '../app/routers/categories.php';

elseif(isset($_GET['ingredients'])) :
    include_once '../app/routers/ingredients.php';

else:
include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;