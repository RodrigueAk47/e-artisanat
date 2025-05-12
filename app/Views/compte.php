<main class="flex-grow">
    <section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
            Mon Compte
        </h2>
    </section>

    <section class="w-full sm:w-[70%] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Profil utilisateur -->
        <div class="bg-white rounded-2xl shadow p-8 flex flex-col items-center">
            <img src="../assets/img/avatar.png" alt="Avatar utilisateur" class="w-24 h-24 rounded-full mb-4 border-4 border-green-200 object-cover">
            <h3 class="text-xl font-bold mb-1">Nom Prénom</h3>
            <p class="text-gray-600 mb-4">email@exemple.com</p>
            <a href="#" class="text-green-600 hover:underline text-sm mb-2">Modifier le profil</a>

            

            <a href="#" class="text-red-500 hover:underline text-sm">Se déconnecter</a>
        </div>
        <!-- Informations du compte -->
        <div class="bg-white rounded-2xl shadow p-8">
            <h4 class="text-lg font-semibold mb-4">Informations du compte</h4>
            <ul class="space-y-3 text-gray-700">
                <li><span class="font-medium">Adresse :</span> Abidjan, Côte d’Ivoire</li>
                <li><span class="font-medium">Téléphone :</span> +225 01 23 45 67 89</li>
                <li><span class="font-medium">Date d’inscription :</span> 12/06/2024</li>
            </ul>
            <hr class="my-6">
            <div class="flex items-center justify-between mb-4">
                <h4 class="text-lg font-semibold">Mes commandes</h4>
                <a href="/mescommandes.html" class="text-green-600 text-sm hover:underline flex items-center gap-1">
                    Voir plus
                    <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>
            <ul class="space-y-2">
                <a href="/detailcommande.html">
                    <li class="flex justify-between items-center bg-gray-100 rounded px-4 py-2 hover:bg-green-50 transition">
                        <span>Commande #1234</span>
                        <span class="text-green-600 font-medium">Livrée</span>
                    </li>
                </a>
                <a href="/detailcommande.html">
                    <li class="flex justify-between items-center bg-gray-100 rounded px-4 py-2 hover:bg-green-50 transition">
                        <span>Commande #1235</span>
                        <span class="text-yellow-600 font-medium">En cours</span>
                    </li>
                </a>
                <a href="/detailcommande.html">
                    <li class="flex justify-between items-center bg-gray-100 rounded px-4 py-2 hover:bg-green-50 transition">
                        <span>Commande #1235</span>
                        <span class="text-yellow-600 font-medium">En cours</span>
                    </li>
                </a>
                <a href="/detailcommande.html">
                    <li class="flex justify-between items-center bg-gray-100 rounded px-4 py-2 hover:bg-green-50 transition">
                        <span>Commande #1235</span>
                        <span class="text-yellow-600 font-medium">En cours</span>
                    </li>
                </a>
                <a href="/detailcommande.html">
                    <li class="flex justify-between items-center bg-gray-100 rounded px-4 py-2 hover:bg-green-50 transition">
                        <span>Commande #1235</span>
                        <span class="text-yellow-600 font-medium">En cours</span>
                    </li>
                </a>
               
            </ul>
        </div>
    </section>
</main>