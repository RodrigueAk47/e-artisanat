<main class="flex-grow">
        <section class="w-full sm:w-[70%] mx-auto mt-10 px-4 flex flex-col gap-8 bg-white rounded-3xl shadow-lg py-10">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Votre panier</h1>
            <!-- Liste des produits du panier -->
            <div class="flex flex-col gap-6">
                <!-- Produit 1 -->
                 <?php foreach ($cartItems as $item): ?>
                <div class="flex flex-col sm:flex-row items-center gap-6 border-b pb-6">
                    <img src="<?= $item['img_url'] ?? '' ?>" alt="Masque traditionnel africain" class="w-32 h-32 object-cover rounded-2xl shadow">
                    <div class="flex-1">
                        <h2 class="text-xl font-semibold"><?= $item['name'] ?? 'Produit inconnu' ?></h2>
                        <a href="/author?id=<?= $item['artisan_id'] ?>" class="text-gray-600 text-sm mb-2">Artisan : <span class="font-bold text-green-700"><?= $item['artisan_last_name'] . ' ' . ($item['artisan_first_name'] ?? 'Inconnu') ?></span></a>
                        <div class="flex items-center gap-3">
                            <span class="text-green-600 font-bold text-lg"><?= $item['price'] ?? '0 FCFA' ?></span>
                        </div>
                        <div class="mt-3 flex items-center gap-2">
                            <label for="qty1" class="text-sm">Quantité :</label>
                            <input id="qty1" type="number" min="1" value="<?= 1 ?>" class="w-16 px-2 py-1 border rounded text-center">
                        </div>
                    </div>
                    <a href="/cart/remove?id=<?= $item['id'] ?>" class="text-red-500 hover:text-red-700 transition text-lg" title="Retirer du panier">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </div>
                <?php endforeach; ?>
                <!-- Ajoutez d'autres produits ici si besoin -->
            </div>
            <!-- Résumé du panier -->
            <div class="flex flex-col sm:flex-row justify-between items-center mt-8 gap-6">
                <div class="text-lg">
                    <span class="font-semibold">Total :</span>
                    <span class="text-2xl font-bold text-green-600"><?= $totalPrice ?? '0' ?>FCFA</span>
                </div>
                <div class="flex gap-4">
                    <a href="/" class="px-6 py-2 rounded bg-gray-200 text-gray-700 hover:bg-gray-300 font-semibold transition">Continuer mes achats</a>
                    <a href="/payer" class="px-6 py-2 rounded bg-blue-600 text-white hover:bg-blue-700 font-semibold transition">Commander</a>
                </div>
            </div>
        </section>
    </main>