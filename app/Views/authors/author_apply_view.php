<main class="flex-grow">
    <section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
            Devenir auteur
        </h2>
    </section>

    <section class="w-full sm:w-[70%] mx-auto px-4 mb-10">
        <div class="bg-white rounded-2xl shadow p-8">
            <p class="text-gray-700 mb-6 text-sm">
                En tant qu'auteur, vous pourrez publier vos propres produits, gérer votre vitrine artisanale et gagner en visibilité. Veuillez remplir le formulaire ci-dessous pour soumettre votre demande.
            </p>

            <form action="/author/apply" method="POST" class="space-y-6">
                <div>
                    <label for="bio" class="block font-medium text-gray-800 mb-1">Biographie</label>
                    <textarea id="bio" name="bio" rows="4" required class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400"></textarea>
                </div>

                <div>
                    <label for="location" class="block font-medium text-gray-800 mb-1">Localisation</label>
                    <input type="text" id="location" name="location" placeholder="Ville, Pays" required class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>

                <div>
                    <label for="email" class="block font-medium text-gray-800 mb-1">Email</label>
                    <input type="text" id="email" name="email" placeholder="Votre email" required class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>
                <div>
                    <label for="website" class="block font-medium text-gray-800 mb-1">Site web (optionnel)</label>
                    <input type="url" id="website" name="website" placeholder="https://votresite.com" class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>

                <div>
                    <label for="social_media_links" class="block font-medium text-gray-800 mb-1">Réseaux sociaux (JSON)</label>
                    <textarea id="social_media_links" name="social_media_links" rows="3" placeholder='["https://facebook.com/votrepage", "https://instagram.com/votreprofil"]' class="w-full border border-gray-300 rounded-lg p-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-400"></textarea>
                </div>

                <div class="text-right">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-green-700 transition">
                        Soumettre la demande
                    </button>
                </div>
            </form>
        </div>
    </section>
</main>
</div>