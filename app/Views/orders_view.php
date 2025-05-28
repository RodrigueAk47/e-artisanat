<main class="flex-grow">
        <section class="w-full sm:w-[70%] mx-auto mt-12 mb-6 px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 bg-gray-300 py-4 rounded-full">
                Mes Commandes
            </h2>
        </section>

        <section class="w-full sm:w-[70%] mx-auto px-4">
            <div class="bg-white rounded-2xl shadow p-8">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">N° Commande</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Montant</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Détails</th>
                        </tr>
                    </thead>
                   <tbody class="bg-white divide-y divide-gray-100">
    <?php foreach ($commandes as $commande): ?>
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">#<?= $commande['id'] ?></td>
            <td class="px-6 py-4 whitespace-nowrap"><?= (new DateTime($commande['date_commande']))->format('d/m/Y') ?></td>
            <td class="px-6 py-4 whitespace-nowrap"><?= number_format($commande['total'], 0, ',', ' ') ?> FCFA</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <?php
                    $statut = $commande['statut'];
                    $classe = match ($statut) {
                        'Livrée' => 'text-green-600',
                        'En cours', 'Expédiée' => 'text-yellow-600',
                        'Annulée' => 'text-red-600',
                        default => 'text-gray-600',
                    };
                ?>
                <span class="<?= $classe ?> font-medium"><?= htmlspecialchars($statut) ?></span>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <a href="/detail-commande?id=<?= $commande['id'] ?>" class="text-green-600 hover:underline">Voir</a>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>

                </table>
            </div>
        </section>
    </main>