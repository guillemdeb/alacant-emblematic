<!-- App "Descobreix Alacant" - Versió responsive i preparació PWA amb Tailwind CSS -->
<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/vnd.icon" href="img/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
  <link rel="icon" type="image/vnd.icon" sizes="32x32" href="img/favicon-32x32.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Descobreix Alacant</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="manifest" href="manifest.json" />
  <meta name="theme-color" content="#004a7c" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44c=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-o9N1j7kPpY2zQjCihT2Vk1j6Uga6AoN+XH0v+IlrQ1k=" crossorigin=""></script>
  <style>
    .flag-button img {
      width: 24px;
      height: 16px;
      object-fit: cover;
    }
    .social-icon {
      width: 32px;
      height: 32px;
    }
  </style>
</head>
<body class="bg-white text-gray-800">
<header class="bg-blue-900 text-white p-4 shadow relative">
  <div class="container mx-auto flex items-center justify-between">
    <h1 class="text-2xl font-bold" id="titol">Descobreix Alacant</h1>

    <!-- Botó hamburguesa mòbil -->
    <button class="md:hidden block focus:outline-none" onclick="toggleMenu()">
      <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
      </svg>
    </button>

    <!-- Navegació per a escriptori -->
    <nav class="hidden md:flex flex-wrap items-center gap-4" id="menuDesktop">
      <a href="#mapa" id="nav-mapa">Mapa</a>
      <a href="#rutes" id="nav-rutes">Rutes</a>
      <a href="#valoracions" id="nav-valoracions">Valoracions</a>
      <a href="#info" id="nav-info">Informació</a>
      <div class="flex gap-2 ml-4 flex-wrap">
        <button class="flag-button" onclick="canviarIdioma('ca')"><img src="img/Catalonia.svg" alt="Català" /></button>
        <button class="flag-button" onclick="canviarIdioma('es')"><img src="img/Spain.svg" alt="Español" /></button>
        <button class="flag-button" onclick="canviarIdioma('en')"><img src="img/UK.svg" alt="English" /></button>
        <button class="flag-button" onclick="canviarIdioma('fr')"><img src="img/France.svg" alt="Française" /></button>
        <button class="flag-button" onclick="canviarIdioma('it')"><img src="img/Italy.svg" alt="Italiano" /></button>
        <button class="flag-button" onclick="canviarIdioma('ar')"><img src="img/Arabic.svg" alt="عربي" /></button>
        <button class="flag-button" onclick="canviarIdioma('uk')"><img src="img/Ukraine.svg" alt="Українська" /></button>
      </div>
    </nav>
  </div>

  <!-- Panell lateral mòbil -->
  <div id="menuMobil" class="fixed top-0 left-0 w-1/2 h-full bg-blue-800 text-white z-50 p-6 transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden">
    <button onclick="toggleMenu()" class="absolute top-4 right-4 text-white text-2xl">&times;</button>
    <nav class="flex flex-col gap-4 mt-8">
      <a href="#mapa" onclick="toggleMenu()" id="nav-mapa-mob">Mapa</a>
      <a href="#rutes" onclick="toggleMenu()" id="nav-rutes-mob">Rutes</a>
      <a href="#valoracions" onclick="toggleMenu()" id="nav-valoracions-mob">Valoracions</a>
      <a href="#info" onclick="toggleMenu()" id="nav-info-mob">Informació</a>
      <div class="flex gap-2 mt-4 flex-wrap">
        <button class="flag-button" onclick="canviarIdioma('ca'); toggleMenu()"><img src="img/Catalonia.svg" alt="Català" /></button>
        <button class="flag-button" onclick="canviarIdioma('es'); toggleMenu()"><img src="img/Spain.svg" alt="Español" /></button>
        <button class="flag-button" onclick="canviarIdioma('en'); toggleMenu()"><img src="img/UK.svg" alt="English" /></button>
        <button class="flag-button" onclick="canviarIdioma('fr'); toggleMenu()"><img src="img/France.svg" alt="Française" /></button>
        <button class="flag-button" onclick="canviarIdioma('it'); toggleMenu()"><img src="img/Italy.svg" alt="Italiano" /></button>
        <button class="flag-button" onclick="canviarIdioma('ar'); toggleMenu()"><img src="img/Arabic.svg" alt="عربي" /></button>
        <button class="flag-button" onclick="canviarIdioma('uk'); toggleMenu()"><img src="img/Ukraine.svg" alt="Українська" /></button>
      </div>
    </nav>
  </div>

  <!-- Capa fosc del fons -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden" onclick="toggleMenu()"></div>
</header>

<script>
  // Toggle menú lateral en mòbil
  function toggleMenu() {
    const menu = document.getElementById('menuMobil');
    const overlay = document.getElementById('overlay');
    const isOpen = !menu.classList.contains('-translate-x-full');
    if (isOpen) {
      menu.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    } else {
      menu.classList.remove('-translate-x-full');
      overlay.classList.remove('hidden');
    }
  }
</script>


  <main class="container mx-auto p-4 space-y-12">
    <section id="mapa">
      <h2 class="text-xl font-semibold mb-2" id="txt-mapa">Mapa Interactiu</h2>
      <div id="mapa-container" class="h-96 rounded overflow-hidden shadow mb-4"></div>
      <button id="center-map" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition">Centrar en la meua posició</button>
    </section>

    <section id="rutes">
      <h2 class="text-xl font-semibold mb-2" id="txt-rutes">Rutes Emblemàtiques</h2>
      <ul class="list-disc pl-6 space-y-1">
        <a href="mapa.php"><li>Ruta Històrica</li></a>
        <li>Ruta Gastronòmica</li>
        <li>Ruta Cultural</li>
        <li>Ruta de la Guerra Civil</li>
      </ul>
    </section>

    <section id="valoracions">
      <h2 class="text-xl font-semibold mb-2" id="txt-valoracions">Valoracions d'Usuaris</h2>
      <div id="comentaris" class="bg-gray-100 p-4 rounded shadow">[COMENTARIS]</div>
    </section>

    <section id="info">
      <h2 class="text-xl font-semibold mb-2" id="txt-info">Informació dels Llocs</h2>
      <p class="leading-relaxed" id="txt-descripcio">Descobreix els llocs més icònics d'Alacant amb realitat augmentada, dades històriques, fotografies antigues i molt més.</p>
    </section>
  </main>

  <footer class="bg-blue-900 text-white mt-12 p-4">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
      <div class="flex gap-4 mb-2 md:mb-0">
        <a href="https://www.facebook.com" target="_blank"><img src="img/facebook.svg" alt="Facebook" class="social-icon rounded-full hover:opacity-80" /></a>
        <a href="https://www.instagram.com" target="_blank"><img src="img/instagram.svg" alt="Instagram" class="social-icon rounded-full hover:opacity-80" /></a>
        <a href="https://www.twitter.com" target="_blank"><img src="img/twitter.svg" alt="Twitter" class="social-icon rounded-full hover:opacity-80" /></a>
      </div>
      <p class="text-sm">&copy; 2025 Descobreix Alacant. Tots els drets reservats.</p>
    </div>
  </footer>

  <script>
    if ('serviceWorker' in navigator) {
      window.addEventListener('load', () => {
        navigator.serviceWorker.register('/service-worker.js')
          .then(reg => console.log("Service Worker registrat:", reg))
          .catch(err => console.error("Error al registrar SW:", err));
      });
    }

    const textos = {
      ca: {
        titol: 'Descobreix Alacant', mapa: 'Mapa Interactiu', rutes: 'Rutes Emblemàtiques', valoracions: "Valoracions d'Usuaris", info: 'Informació dels Llocs', descripcio: "Descobreix els llocs més icònics d'Alacant amb realitat augmentada, dades històriques, fotografies antigues i molt més."
      },
      es: {
        titol: 'Descubre Alicante', mapa: 'Mapa Interactivo', rutes: 'Rutas Emblemáticas', valoracions: 'Valoraciones de Usuarios', info: 'Información de los Lugares', descripcio: 'Descubre los lugares más icónicos de Alicante con realidad aumentada, datos históricos, fotografías antiguas y mucho más.'
      },
      en: {
        titol: 'Discover Alicante', mapa: 'Interactive Map', rutes: 'Iconic Routes', valoracions: 'User Reviews', info: 'Place Information', descripcio: 'Discover the most iconic places in Alicante with augmented reality, historical facts, old photos and more.'
      },
      fr: {
        titol: 'Découvrez Alicante', mapa: 'Carte Interactive', rutes: 'Routes Emblématiques', valoracions: 'Avis des Utilisateurs', info: 'Informations sur les Lieux', descripcio: 'Découvrez les lieux les plus emblématiques d\'Alicante avec la réalité augmentée, des données historiques, des photos anciennes et bien plus encore.'
      },
      it: {
        titol: 'Scopri Alicante', mapa: 'Mappa Interattiva', rutes: 'Percorsi Emblematici', valoracions: 'Valutazioni degli Utenti', info: 'Informazioni sui Luoghi', descripcio: 'Scopri i luoghi più iconici di Alicante con realtà aumentata, dati storici, foto d\'epoca e molto altro.'
      },
      ar: {
        titol: 'اكتشف أليكانتي', mapa: 'الخريطة التفاعلية', rutes: 'مسارات بارزة', valoracions: 'تقييمات المستخدمين', info: 'معلومات عن الأماكن', descripcio: 'اكتشف أشهر الأماكن في أليكانتي مع الواقع المعزز والمعلومات التاريخية والصور القديمة والمزيد.'
      },
      uk: {
        titol: 'Відкрий Аліканте', mapa: 'Інтерактивна карта', rutes: 'Емблемні маршрути', valoracions: 'Відгуки користувачів', info: 'Інформація про місця', descripcio: 'Відкривайте найбільш знакові місця Аліканте з доповненою реальністю, історичними фактами, старовинними фотографіями та багато іншого.'
      }
    };

    function canviarIdioma(idioma) {
      if (textos[idioma]) {
        localStorage.setItem('idiomaSeleccionat', idioma);
        actualitzarTextos(idioma);
      } else {
        console.warn("Idioma no suportat:", idioma);
        actualitzarTextos('ca');
      }
    }

    function actualitzarTextos(idioma) {
      document.getElementById('titol').textContent = textos[idioma].titol;
      document.getElementById('nav-mapa').textContent = textos[idioma].mapa;
      document.getElementById('nav-rutes').textContent = textos[idioma].rutes;
      document.getElementById('nav-valoracions').textContent = textos[idioma].valoracions;
      document.getElementById('nav-info').textContent = textos[idioma].info;
      document.getElementById('txt-descripcio').textContent = textos[idioma].descripcio;
      document.getElementById('txt-mapa').textContent = textos[idioma].mapa;
      document.getElementById('txt-rutes').textContent = textos[idioma].rutes;
      document.getElementById('txt-valoracions').textContent = textos[idioma].valoracions;
      document.getElementById('txt-info').textContent = textos[idioma].info;
    }

    const idiomaGuardat = localStorage.getItem('idiomaSeleccionat') || 'ca';
    canviarIdioma(idiomaGuardat);
  </script>
</body>
</html>

