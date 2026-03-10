<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditions d'Utilisation et Avis de Copyright - Universal Welfare</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('image/ab.png') }}">
    <!-- Police Arial Black -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arial+Black&display=swap" rel="stylesheet">
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Swiper.js -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: '#1E90FF',
              secondary: '#87CEFA',
              yellow: '#FFD700'
            }
          }
        }
      }
    </script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
      [x-cloak] { display: none; }
      body {
        font-family: 'Arial Black', Arial, sans-serif;
        background-color: #ffffff;
        font-weight: bold;
      }
      .partner-logo { width: 80px; height: 80px; object-fit: contain; transition: transform 0.3s; }
      .swiper-slide img { width: 100%; height: auto; max-height: 400px; object-fit: cover; }
      .swiper-slide-active .partner-logo { transform: scale(1.3); }
      .dropdown-menu { background-color: white; z-index: 50; }
      .wave-divider {
        position: absolute;
        top: -1px;
        left: 0;
        width: 100%;
        overflow: hidden;
        line-height: 0;
      }
      .wave-divider svg {
        position: relative;
        display: block;
        width: calc(100% + 1.3px);
        height: 40px;
      }
      .wave-divider .shape-fill {
        fill: url(#gradient-wave);
      }
      .footer-link {
        transition: color 0.3s ease, transform 0.3s ease;
      }
      .footer-link:hover {
        transform: translateX(5px);
      }
      .social-icon {
        transition: transform 0.3s ease, opacity 0.3s ease;
      }
      .social-icon:hover {
        transform: scale(1.2);
        opacity: 0.8;
      }
      /* Animation pour la phrase défilante */
      .marquee-container {
        width: 100%;
        overflow: hidden;
        white-space: nowrap;
        background-color: #1E90FF;
        padding: 0.5rem 0;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        z-index: 10;
      }
      .marquee-text {
        display: inline-block;
        font-size: 1rem;
        font-weight: bold;
        color: #FFD700;
        animation: marquee 15s linear infinite;
        text-align: center;
      }
      @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
      }
      /* Styles spécifiques pour la page Conditions */
      .legal-content {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 0.5rem;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
      }
      .legal-content h1, .legal-content h2 {
        color: #1E90FF;
        text-align: center;
      }
      .legal-content h2 {
        border-bottom: 2px solid #FFD700;
        padding-bottom: 10px;
        margin-top: 1.5rem;
      }
      .legal-content h3 {
        margin-top: 1.25rem;
        color: #333;
        text-align: center;
      }
      .legal-content ul {
        list-style-type: disc;
        list-style-position: inside;
        margin-top: 0.5rem;
        margin-bottom: 1rem;
        text-align: center;
      }
      .legal-content a {
        color: #1E90FF;
        text-decoration: none;
      }
      .legal-content a:hover {
        text-decoration: underline;
      }
      .legal-content p {
        margin-bottom: 1rem;
        line-height: 1.6;
        text-align: center;
      }
      /* Loading Spinner Styles */
      .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        transition: opacity 0.5s ease-out;
      }
      .loading-overlay[x-show="isLoading"] {
        opacity: 1;
      }
      .loading-overlay:not([x-show="isLoading"]) {
        opacity: 0;
        pointer-events: none;
      }
      .spinner-container {
        position: relative;
        width: 100px;
        height: 100px;
      }
      .spinner-circle {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 4px solid transparent;
        border-top-color: #1E90FF;
        border-radius: 50%;
        animation: spin 1s linear infinite;
      }
      .spinner-logo {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 60px;
        height: 60px;
        object-fit: contain;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }
      @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
      }
      @media (max-width: 640px) {
        .spinner-container {
          width: 80px;
          height: 80px;
        }
        .spinner-logo {
          width: 48px;
          height: 48px;
        }
      }
    </style>
</head>
<body id="top" x-data="{ mobileMenuOpen: false, isLoading: true }" class="bg-white flex flex-col min-h-screen" @load.window="setTimeout(() => isLoading = false, 2000)">
    <!-- Loading Spinner -->
    <div x-show="isLoading" x-cloak class="loading-overlay">
        <div class="spinner-container">
            <div class="spinner-circle"></div>
            <img src="{{ asset('image/ab.png') }}" alt="Logo ABEC" class="spinner-logo transition-transform duration-300 hover:scale-105">
        </div>
    </div>

    <!-- Top Bar avec réseaux sociaux -->
    <nav class="bg-primary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-10">
            <div class="flex space-x-4">
                <a href="https://www.facebook.com/profile.php?id=61568266295634" target="_blank"><img src="{{ asset('image/feacebook.jpg') }}" alt="Facebook" class="w-6 h-6 rounded-full"></a>
                <a href="https://whatsapp.com/channel/0029VaYTsNkD8SE42sDpnk1w" target="_blank"><img src="{{ asset('image/wastapp.jpg') }}" alt="WhatsApp" class="w-6 h-6 rounded-full"></a>
                <a href="https://www.instagram.com/abec.officiel/" target="_blank"><img src="{{ asset('image/insta.jpg') }}" alt="Instagram" class="w-6 h-6 rounded-full"></a>
            </div>
            <a href="https://mail.google.com/mail/?view=cm&to=contact@universalwelfare.org" 
               target="_blank" 
               class="hover:opacity-80 transition-opacity duration-300" 
               title="Envoyer un email via Gmail">
                <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full">
            </a>
        </div>
    </nav>
    <!-- Header principal -->
    <header class="bg-white shadow py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between h-16">
            <!-- Logo réduit -->
            <div class="flex-shrink-0 w-20 flex justify-center">
                <img src="{{ asset('image/ab.png') }}" alt="logo" class="w-full h-auto">
            </div>
            <!-- Menu Desktop -->
            <nav class="hidden md:flex space-x-6">
                <a href="{{ url('/') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Accueil</a>
                <a href="{{ url('branche') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Evenements</a>
                <a href="{{ url('/dons') }}" class="px-3 py-2 rounded-md text-sm font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Dons</a>
            </nav>
            <!-- Menu Mobile -->
            <div class="md:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-500 focus:outline-none">
                    <svg x-show="!mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileMenuOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden px-2 pt-2 pb-3 space-y-1">
            <a href="{{ url('/') }}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Accueil</a>
            <a href="{{ url('branche') }}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Evenements</a>
            <a href="{{ url('/dons') }}" class="block px-3 py-2 rounded-md text-base font-bold text-gray-800 hover:bg-blue-500 hover:text-white">Dons</a>
        </div>
    </header>

    <!-- Contenu principal : Conditions d'Utilisation -->
    <main class="flex-1 py-8">
        <div class="legal-content" style="font-family: 'Arial Black', Arial, sans-serif; font-weight: bold;">
            <hr class="border-2 border-yellow mb-8">
            <h1 class="text-3xl font-bold text-primary mb-6 text-center">Conditions d'Utilisation et Avis de Copyright</h1>
            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">Conditions d'Utilisation</h2>
            <p>Bienvenue sur le site web de l'Association du Bien-Être Communautaire (ABEC), accessible à l'adresse <a href="https://universalwelfare.org">universalwelfare.org</a>. En accédant ou en utilisant ce site, vous acceptez d'être lié par les présentes conditions d'utilisation. Si vous n'acceptez pas ces conditions, veuillez ne pas utiliser ce site.</p>

            <h3>1. Utilisation du Site</h3>
            <ul>
                <li><strong>Contenu et Propriété Intellectuelle</strong> : Tout le contenu du site, y compris les textes, images, logos, vidéos et autres matériaux, est la propriété exclusive de l'ABEC ou de ses licenciés. Vous ne pouvez pas copier, reproduire, distribuer ou modifier ce contenu sans autorisation écrite préalable.</li>
                <li><strong>Utilisation Autorisée</strong> : Vous êtes autorisé à consulter le site à des fins personnelles et non commerciales. Toute utilisation à des fins commerciales est strictement interdite sans consentement.</li>
                <li><strong>Comportement de l'Utilisateur</strong> : Vous vous engagez à ne pas utiliser le site pour des activités illégales, frauduleuses ou nuisibles, y compris la diffusion de virus, le harcèlement ou la violation des droits d'autrui.</li>
                <li><strong>Données Personnelles</strong> : Nous respectons votre vie privée. Consultez notre Politique de Confidentialité pour plus d'informations sur la collecte et l'utilisation de vos données.</li>
            </ul>

            <h3>2. Responsabilité</h3>
            <ul>
                <li><strong>Limitation de Responsabilité</strong> : L'ABEC ne garantit pas l'exactitude, la complétude ou la disponibilité du site. Nous ne serons pas responsables des dommages directs, indirects ou consécutifs résultant de l'utilisation du site.</li>
                <li><strong>Liens Externes</strong> : Le site peut contenir des liens vers des sites tiers. L'ABEC n'est pas responsable du contenu ou des pratiques de ces sites.</li>
            </ul>

            <h3>3. Modifications</h3>
            <p>L'ABEC se réserve le droit de modifier ces conditions à tout moment. Les modifications seront publiées sur cette page, et votre utilisation continue du site constitue une acceptation de ces changements.</p>

            <h3>4. Loi Applicable</h3>
            <p>Ces conditions sont régies par les lois du Cameroun, en particulier la Loi n°90/053 du 19 décembre 1990 sur la liberté d'association et la Loi n°99/014 du 22 décembre 1999 régissant les ONG.</p>

            <hr class="border-2 border-yellow my-8">
            <h2 class="text-2xl font-bold text-primary mt-8 mb-4 text-center">Avis de Copyright</h2>
           
            <p>© {{ date('Y') }} Association du Bien-Être Communautaire (ABEC). Tous droits réservés.</p>
            <ul>
                <li>Tout le contenu de ce site, y compris les textes, graphiques, logos, images, clips audio/vidéo et logiciels, est protégé par les lois internationales sur le copyright et la propriété intellectuelle.</li>
                <li>Aucune partie de ce site ne peut être reproduite, distribuée, transmise, copiée ou utilisée sans l'autorisation écrite préalable de l'ABEC.</li>
               <li>
    Pour toute demande d'autorisation ou information supplémentaire, veuillez nous contacter à :  
    E-mail : 
    <a href="https://mail.google.com/mail/?view=cm&to=contact@universalwelfare.org" 
       target="_blank" 
       class="hover:opacity-80 transition-opacity duration-300" 
       title="Envoyer un email via Gmail">
        <img src="{{ asset('image/m.jpg') }}" alt="Email" class="w-6 h-6 rounded-full inline-block">
    </a>  
    ou au +237 6 21 62 06 77.
</li>

            </ul>

            <p>Pour plus d'informations, veuillez consulter notre page <a href="https://universalwelfare.org/faq">FAQ</a> ou nous contacter directement.</p>
            <hr class="border-2 border-yellow mt-8">
        </div>
    </main>

    @include('partials.footer')
</body>
</html>