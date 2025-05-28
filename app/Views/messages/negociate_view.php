<main class="flex-grow p-8 max-w-2xl mx-auto">
  <h1 class="text-2xl font-bold mb-4">Négociation pour « <?= htmlspecialchars($prod['name']) ?> »</h1>
  <div class="space-y-4 mb-8">
    <?php foreach($conversation as $m): ?>
      <div class="p-4 rounded-lg <?= $m['sender_id']===$_SESSION['user']['id']? 'bg-blue-50 self-end':'bg-gray-100 self-start' ?>">
        <p class="text-sm"><strong><?= htmlspecialchars($m['sender_first'].' '.$m['sender_last']) ?></strong> <em><?= (new DateTime($m['created_at']))->format('d/m H:i') ?></em></p>
        <p><?= nl2br(htmlspecialchars($m['content'])) ?></p>
        <?php if($m['offer']!==''): ?>
          <p class="mt-2 text-green-700 font-semibold">Proposition : <?= number_format($m['offer'],0,',',' ') ?> FCFA</p>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>

  <form method="POST" class="space-y-4">
    <textarea name="content" required placeholder="Votre message..." rows="3"
      class="w-full border rounded p-2 focus:ring-2 focus:ring-green-400"></textarea>
    <input type="number" name="offer" step="0.01" placeholder="Proposition de prix (optionnel)"
      class="w-full border rounded p-2 focus:ring-2 focus:ring-green-400"/>
    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
      Envoyer
    </button>
  </form>
</main>
