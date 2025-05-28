<main class="flex-grow">
    <section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
        <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
            Détail de la Commande #<?= htmlspecialchars($commande['id']) ?>
        </h2>
    </section>

    <section class="w-full sm:w-[70%] mx-auto px-4">
        <div class="bg-white rounded-2xl shadow p-8 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p><span class="font-semibold">N° Commande :</span> #<?= htmlspecialchars($commande['id']) ?></p>
                    <p><span class="font-semibold">Date :</span> <?= (new DateTime($commande['date_commande']))->format('d/m/Y') ?></p>
                    <p><span class="font-semibold">Statut :</span>
                        <?php
                        $statut = $commande['statut'];
                        $color = match ($statut) {
                            'Livrée' => 'text-green-600',
                            'En attente', 'Payée' => 'text-yellow-600',
                            'Annulée' => 'text-red-600',
                            default => 'text-gray-600'
                        };
                        ?>
                        <span class="<?= $color ?> font-medium"><?= htmlspecialchars($statut) ?></span>
                    </p>
                </div>
                <div>
                    <p><span class="font-semibold">Montant total :</span> <?= number_format($commande['total'], 0, ',', ' ') ?> FCFA</p>
                    <p><span class="font-semibold">Adresse de livraison :</span> <?= htmlspecialchars($commande['address']) ?></p>
                    <p><span class="font-semibold">Téléphone :</span> <?= '+225 ' . htmlspecialchars($commande['phone_number']) ?></p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow p-8">
            <h3 class="text-xl font-bold mb-4">Articles commandés</h3>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Produit</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantité</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prix Unitaire</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    <?php foreach ($articles as $a): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap flex items-center gap-3">
                                <img src="<?= htmlspecialchars($a['img_url']) ?>" alt="<?= htmlspecialchars($a['name']) ?>" class="h-12 w-12 rounded object-cover">
                                <?= htmlspecialchars($a['name']) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= $a['quantite'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= number_format($a['prix_unitaire'], 0, ',', ' ') ?> FCFA</td>
                            <td class="px-6 py-4 whitespace-nowrap"><?= number_format($a['prix_unitaire'] * $a['quantite'], 0, ',', ' ') ?> FCFA</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-right font-bold">Total</td>
                        <td class="px-6 py-4 font-bold"><?= number_format($commande['total'], 0, ',', ' ') ?> FCFA</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </section>
</main>
