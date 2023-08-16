<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-stone-200 flex content-center  justify-center h-full items-center">
    <div class="max-w-lg bg-white shadow-lg rounded-md">
        <div class="w-full flex justify-center">        
            <img class="w-20 h-20 m-4 object-cover" src="https://picsum.photos/seed/71/200/300" alt="foto">
        </div>
        <div class="p-4 flex-1">
            <h1 class="text-lg font-bold text-stone-900">Connexion au site</h1>
            <div class="mb-4 mt-4"> 
                <label for="username" class="block text-stone-600">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" class="border shadow-inner rounded-lg text-stone-700 w-full focus:shadow-outline">
            </div>
            <div class="mb-4 mt-4">
                <label for="password" class="block text-stone-600">Mot de passe</label>
                <input type="text" id="password" name="password" class="border shadow-inner rounded-lg text-stone-700 w-full focus:shadow-outline">
            </div>
            <div class="w-full flex justify-center">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">Se connecter</button>        
            </div>
        </div>
    </div>
</body>