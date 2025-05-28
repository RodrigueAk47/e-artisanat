        <main class="flex-1 p-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8 gap-4">
                <h1 class="text-3xl font-bold">Mes commandes</h1>
            </div>

            <!-- Orders Table -->
            <div class="bg-white rounded-xl shadow p-6">
                <h2 class="text-xl font-bold mb-4">Liste de mes commandes</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 font-semibold">N° Commande</th>
                                <th class="py-2 px-4 font-semibold">Date</th>
                                <th class="py-2 px-4 font-semibold">Produit</th>
                                <th class="py-2 px-4 font-semibold">Quantité</th>
                                <th class="py-2 px-4 font-semibold">Total</th>
                                <th class="py-2 px-4 font-semibold">Statut</th>
                                <th class="py-2 px-4 font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $o): ?>
                                <tr class="border-t">
                                    <td class="py-2 px-4">#<?= htmlspecialchars($o['commande_id']) ?></td>
                                    <td class="py-2 px-4"><?= (new DateTime($o['date_commande']))->format('Y-m-d') ?></td>
                                    <td class="py-2 px-4"><?= htmlspecialchars($o['produit']) ?></td>
                                    <td class="py-2 px-4"><?= $o['quantite'] ?></td>
                                    <td class="py-2 px-4"><?= number_format($o['total_ligne'], 0, ',', ' ') ?> FCFA</td>
                                    <?php
                                    // choix de la couleur selon le statut
                                    $cls = match ($o['statut']) {
                                        'Livrée'     => 'bg-green-100 text-green-800',
                                        'En attente' => 'bg-yellow-100 text-yellow-800',
                                        'Payée'      => 'bg-blue-100 text-blue-800',
                                        'Annulée'    => 'bg-red-100 text-red-800',
                                        default      => 'bg-gray-100 text-gray-800',
                                    };
                                    ?>
                                    <td class="py-2 px-4">
                                        <span class="<?= $cls ?> px-2 py-1 rounded text-xs"><?= htmlspecialchars($o['statut']) ?></span>
                                    </td>
                                    <td class="py-2 px-4">
                                        <a href="/detailcommande?id=<?= $o['commande_id'] ?>" class="text-blue-600 hover:underline mr-2">Voir</a>
                                        <?php if ($o['statut'] === 'En attente'): ?>
                                            <a href="/commande/valider?id=<?= $o['commande_id'] ?>" class="text-green-600 hover:underline">Valider</a>
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