<div class="bg-yellow-500 rounded-lg shadow-lg p-6 mb-6">
    <h2 class="text-xl text-white font-bold mb-4">Login des users</h2>
    
    <form action="users/login" method="post" class="space-y-4">
        <div>
            <label for="login" class="block text-sm font-medium text-white">Pseudo :</label>
            <input type="text" id="login" name="login" required class="mt-1 p-2 w-full rounded-md bg-white text-gray-500 border border-gray-600 focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50">
        </div>
        <div>
            <label for="pwd" class="block text-sm font-medium text-white">Mot de passe :</label>
            <input type="password" id="pwd" name="pwd" required class="mt-1 p-2 w-full rounded-md bg-white text-gray-500 border border-gray-600 focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50">
        </div>
        <div>
            <input type="submit" value="Se connecter" class="mt-2 px-4 py-2 bg-red-500 hover:bg-red-700 rounded-full text-white">
        </div>
    </form>
</div>