<main class="flex-grow p-8 max-w-3xl mx-auto">
  <h1 class="text-2xl font-bold mb-4">Boîte de réception</h1>
  <ul class="space-y-4">
    <?php foreach($inbox as $item): ?>
      <li class="bg-white p-4 rounded shadow flex justify-between items-center">
        <div>
          <p><strong>Produit :</strong> <?= htmlspecialchars($item['product_name']) ?></p>
          <p><strong>Avec :</strong> <?= htmlspecialchars($item['correspondent']) ?></p>
          <p class="text-sm text-gray-600"><?= (new DateTime($item['created_at']))->format('d/m/Y H:i') ?></p>
          <p class="mt-1"><?= htmlspecialchars(substr($item['content'],0,50)) ?>…</p>
        </div>
        <a href="/negocier?product_id=<?= $item['product_id'] ?>" class="text-blue-600 hover:underline">Ouvrir</a>
      </li>
    <?php endforeach; ?>
  </ul>
</main>
