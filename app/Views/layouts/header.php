<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <meta name="description" content="Découvrez les trésors artisanaux de la Côte d’Ivoire avec E-Artisanat.">
    <meta name="theme-color" content="#ffffff">
    <link rel="icon" href="favicon.ico">
    <script src="/assets/css/tailwind.js"></script>
    <link rel="stylesheet" href="/assets/css/font-awesome.css">
</head>

<body class="bg-gray-100 text-gray-800 transition-colors duration-300 min-h-screen flex flex-col">

<!-- Navigation -->
<header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-screen-xl mx-auto px-8 py-5 flex justify-between items-center">
        <div class="text-2xl font-extrabold text-green-600 tracking-wide"><a href="/">E-Artisanat</a></div>
        <nav class="flex items-center gap-5 text-lg font-medium">
            <a href="#" id="notification-btn" class="text-gray-700 hover:text-green-600 transition flex items-center" aria-label="Notifications">
                <i class="fa-regular fa-bell text-xl"></i>
            </a>
            <a href="/conversations.html" class="text-gray-700 hover:text-green-600 transition flex items-center" aria-label="messages">
                <i class="fa-regular fa-message text-xl"></i>
            </a>
            <a href="/panier.html" class="text-gray-700 hover:text-green-600 transition flex items-center mr-3" aria-label="Panier">
                <i class="fa-solid fa-cart-shopping text-xl"></i>
            </a>

            <!-- Notification Popup -->
            <div id="notification-popup" class="hidden absolute right-7 top-20 bg-white shadow-lg rounded-xl p-4 w-80 z-50">
                <div class="flex items-center justify-between mb-4">
                    <h4 class="text-lg font-semibold">Notifications</h4>
                    <a href="/notifications.html" class="text-green-600 text-sm hover:underline flex items-center gap-1">
                        Voir plus
                        <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
                <ul class="text-gray-700 text-sm space-y-2">
                    <li>Aucune nouvelle notification.</li>
                </ul>
                <button id="close-notification" class="mt-4 px-4 py-1 bg-green-600 text-white rounded hover:bg-green-700">Fermer</button>
            </div>



            <div class="relative flex flex-row">

                <a href="#" id="account-btn" class="text-gray-700 hover:text-green-600 transition flex items-center" aria-label="Compte">
                    <i class="fa-regular fa-user text-xl"></i>
                </a>

                <!-- Account Popup -->
                <div id="account-popup" class="hidden absolute right-3 top-20 bg-white shadow-lg rounded-xl p-4 w-64 z-50">
                    <div class="flex items-center gap-3 mb-4">
                        <i class="fa-regular fa-user text-2xl text-green-600"></i>
                        
                    </div>
                    <a href="/login"><button id="login-btn" class="w-full px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 mb-2">Se connecter</button></a>
                    <button id="close-account" class="w-full px-4 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Fermer</button>
                    
                </div>
                <?php if (isset($_SESSION['user'])): ?>
                    <div id="account-popup" class="hidden absolute right-3 top-20 bg-white shadow-lg rounded-xl p-4 w-64 z-50">
                    <div class="flex items-center gap-3 mb-4">
                        <i class="fa-regular fa-user text-2xl text-green-600"></i>
                        <div>
                            <p class="font-semibold">Jack Lee</p>
                            <a href="compte.html" class="text-green-600 text-sm hover:underline">Voir le profil</a>
                        </div>
                    </div>
                    <button id="logout-btn" class="w-full px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 mb-2">Se déconnecter</button>
                    <button id="close-account" class="w-full px-4 py-1 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Fermer</button>
                </div>
                <?php endif; ?>
            </div>

        </nav>
    </div>
</header>


