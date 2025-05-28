<main class="flex-1 p-8">
  <h1 class="text-3xl font-bold mb-8">Tableau de bord auteur</h1>

  <!-- Summary Cards -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
      <i class="fa-solid fa-box text-3xl text-blue-600 mb-2"></i>
      <div class="text-2xl font-bold"><?= $productCount ?></div>
      <div class="text-gray-500">Mes produits</div>
    </div>
    <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
      <i class="fa-solid fa-shopping-cart text-3xl text-yellow-500 mb-2"></i>
      <div class="text-2xl font-bold"><?= $orderCount ?></div>
      <div class="text-gray-500">Commandes reçues</div>
    </div>
    <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center">
      <i class="fa-solid fa-comments text-3xl text-purple-600 mb-2"></i>
      <div class="text-2xl font-bold"><?= $messageCount ?></div>
      <div class="text-gray-500">Nouveaux messages</div>
    </div>
  </div>

  <!-- Products Table -->
  <div class="bg-white rounded-xl shadow p-6 mb-10">
    <h2 class="text-xl font-bold mb-4">Mes derniers produits</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full text-left text-sm">
        <thead>
          <tr>
            <th class="py-2 px-4 font-semibold">Nom</th>
            <th class="py-2 px-4 font-semibold">Catégorie</th>
            <th class="py-2 px-4 font-semibold">Prix</th>
            <th class="py-2 px-4 font-semibold">Stock</th>
            <th class="py-2 px-4 font-semibold">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($recentProducts as $prod): ?>
          <tr class="border-t">
            <td class="py-2 px-4"><?= htmlspecialchars($prod['name']) ?></td>
            <td class="py-2 px-4"><?= htmlspecialchars($prod['category_name']) ?></td>
            <td class="py-2 px-4"><?= number_format($prod['price'],0,',',' ') ?> FCFA</td>
            <td class="py-2 px-4"><?= $prod['stock'] ?></td>
            <td class="py-2 px-4">
              <a href="/product?id=<?= $prod['id'] ?>" class="text-blue-600 hover:underline mr-2">Voir</a>
              <a href="/product/edit?id=<?= $prod['id'] ?>" class="text-green-600 hover:underline mr-2">Éditer</a>
              <a href="/product/delete?id=<?= $prod['id'] ?>" class="text-red-600 hover:underline">Supprimer</a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Orders Table -->
  <div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-xl font-bold mb-4">Mes dernières commandes</h2>
    <div class="overflow-x-auto">
      <table class="min-w-full text-left text-sm">
        <thead>
          <tr>
            <th class="py-2 px-4 font-semibold">ID</th>
            <th class="py-2 px-4 font-semibold">Client</th>
            <th class="py-2 px-4 font-semibold">Montant</th>
            <th class="py-2 px-4 font-semibold">Statut</th>
            <th class="py-2 px-4 font-semibold">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($recentOrders as $cmd): ?>
          <tr class="border-t">
            <td class="py-2 px-4">#<?= htmlspecialchars($cmd['id']) ?></td>
            <td class="py-2 px-4"><?= htmlspecialchars($cmd['client']) ?></td>
            <td class="py-2 px-4"><?= number_format($cmd['total'],0,',',' ') ?> FCFA</td>
            <?php 
              $cls = match($cmd['statut']){
                'Livrée'=>'bg-green-100 text-green-700',
                'En attente'=>'bg-yellow-100 text-yellow-700',
                'Expédiée'=>'bg-blue-100 text-blue-700',
                'Annulée'=>'bg-red-100 text-red-700',
                default=>'bg-gray-100 text-gray-700'
              };
            ?>
            <td class="py-2 px-4"><span class="<?= $cls ?> px-2 py-1 rounded text-xs"><?= htmlspecialchars($cmd['statut']) ?></span></td>
            <td class="py-2 px-4">
              <a href="/detailcommande?id=<?= $cmd['id'] ?>" class="text-blue-600 hover:underline mr-2">Voir</a>
              <?php if($cmd['statut']==='En attente'): ?>
                <a href="/commande/annuler?id=<?= $cmd['id'] ?>" class="text-red-600 hover:underline">Annuler</a>
              <?php endif; ?>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
</div>