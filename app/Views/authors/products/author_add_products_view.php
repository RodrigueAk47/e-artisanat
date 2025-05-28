   <main class="flex-1 p-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
                <h1 class="text-3xl font-bold">Ajouter un produit</h1>
                <a href="/author/products" class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg font-semibold hover:bg-gray-300 transition flex items-center gap-2">
                    <i class="fa-solid fa-arrow-left"></i> Retour à la liste
                </a>
            </div>

            <!-- Edit Product Form -->
            <div class="bg-white rounded-xl shadow p-6 max-w-2xl mx-auto">
                <form action="" method="POST">
                    <div class="mb-4">
                        <label class="block font-semibold mb-2" for="name">Nom du produit</label>
                        <input type="text" id="name" name="name" value="" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2" for="category">Catégorie</label>
                        <select id="category" name="category_id" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2" for="price">Prix (FCFA)</label>
                        <input type="number" id="price" name="price" placeholder="30 000" value="" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2" for="stock">Stock</label>
                        <input type="number" id="stock" name="stock" value="" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2" for="description">Description</label>
                        <textarea id="description" name="description" rows="4" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">Un pagne tissé artisanal de grande qualité.</textarea>
                    </div>
                    
                    <div class="mb-6">
                        <label class="block font-semibold mb-2">Images du produit</label>
                        <div class="flex gap-2" id="image-selection-container">
                            <?php foreach ($uploadedFiles as $image): ?>
                                <img src="<?= htmlspecialchars($image['file_url']) ?>" 
                                     alt="Image produit" 
                                     class="h-20 rounded shadow border cursor-pointer border-2 border-transparent hover:border-green-500"
                                     data-image-id="<?= $image['id'] ?>">
                            <?php endforeach; ?>
                        </div>
                        <input type="hidden" name="selected_image_id" id="selected-image-id" value="">
                        <p class="text-xs text-gray-500 mt-2">Cliquez sur une image pour la sélectionner</p>
                    </div>
                    <script>
                    document.querySelectorAll('#image-selection-container img').forEach(img => {
                        img.addEventListener('click', function() {
                            document.querySelectorAll('#image-selection-container img').forEach(i => {
                                i.classList.remove('border-green-600');
                            });
                            this.classList.add('border-green-600');
                            document.getElementById('selected-image-id').value = this.dataset.imageId;
                        });
                    });
                    </script>
                    <div class="mb-4">   <label class="block font-semibold mb-2" for="dimensions">Dimensions</label>
                        <input type="text" id="dimensions" name="dimensions" placeholder="60cm x 80cm" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2" for="material">Materiaux</label>
                        <input type="text" id="material" name="material" value="" placeholder="Bois..." class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-2" for="origin">Origine</label>
                        <input type="text" id="origin" name="origin" value="" placeholder="Cote d'Ivoire" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
                    </div>
                    <input type="text" name="author_id" value="" class="hidden">
                    <div class="flex justify-end gap-4">
                        <a href="products.html" class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 font-semibold hover:bg-gray-300 transition">Annuler</a>
                        <button type="submit" class="px-5 py-2 rounded-lg bg-green-600 text-white font-semibold hover:bg-green-700 transition">Enregistrer</button>
                    </div>
                    
                </form>
            </div>
        </main>
    </div>