<!-- App "Descobreix Alacant" - Versió responsive i preparació PWA amb Tailwind CSS -->
<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    /* Estil personalitzat per al mapa */
    #mapa-container {
      height: 400px; /* ajusta l'altura del mapa com necessites */
      width: 100%;
    }
  </style>
</head>
<body class="bg-white text-gray-800">
  <header class="bg-blue-900 text-white p-4 shadow">
    <div class="container mx-auto flex flex-col md:flex-row items-center justify-between">
      <h1 class="text-2xl font-bold" id="titol">Descobreix Alacant</h1>
      <nav class="flex flex-wrap items-center gap-4 mt-2 md:mt-0">
        <a href="#mapa" class="hover:underline" id="nav-mapa">Mapa</a>
        <a href="#rutes" class="hover:underline" id="nav-rutes">Rutes</a>
        <a href="#valoracions" class="hover:underline" id="nav-valoracions">Valoracions</a>
        <a href="#info" class="hover:underline" id="nav-info">Informació</a>
        <div class="flex gap-2 items-center">
          <button class="flag-button" onclick="canviarIdioma('ca')" title="Català"><img src="img/Catalonia.svg" alt="Català" /></button>
          <button class="flag-button" onclick="canviarIdioma('es')" title="Español"><img src="img/España.svg" alt="Español" /></button>
          <button class="flag-button" onclick="canviarIdioma('en')" title="English"><img src="img/Uk.svg" alt="English" /></button>
          <button class="flag-button" onclick="canviarIdioma('fr')" title="Français"><img src="img/França.svg" alt="Français" /></button>
          <button class="flag-button" onclick="canviarIdioma('it')" title="Italiano"><img src="img/Italia.svg" alt="Italiano" /></button>
          <button class="flag-button" onclick="canviarIdioma('ar')" title="العربية"><img src="img/arab.svg" alt="العربية" /></button>
          <button class="flag-button" onclick="canviarIdioma('uk')" title="Українська"><img src="img/Uc.svg" alt="Українська" /></button>
        </div>
      </nav>
    </div>
  </header>

  <main class="container mx-auto p-4 space-y-12">
    <section id="mapa">
      <h2 class="text-xl font-semibold mb-2" id="txt-mapa">Mapa Interactiu</h2>
      <!-- Contenidor del mapa on es carregaran els punts i la ruta -->
      <div id="mapa-container" class="h-96 rounded overflow-hidden shadow mb-4"></div>
      <button id="center-map" class="bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800 transition">Centrar en la meua posició</button>
    </section>

    <section id="rutes">
      <h2 class="text-xl font-semibold mb-2" id="txt-rutes">Rutes Emblemàtiques</h2>
      <ul class="list-disc pl-6 space-y-1">
        <li>Ruta Històrica</li>
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

  <!-- Codi JavaScript per afegir el mapa amb punts i ruta -->
  <script src="/js/mapa-ruta-historica.js"></script>
  <script>
    // Afegeix la funció de centrar el mapa en la teua posició
    document.getElementById("center-map").addEventListener("click", function() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          map.setView([position.coords.latitude, position.coords.longitude], 14);
        });
      } else {
        alert("La geolocalització no està disponible.");
      }
    });
  </script>
</body>
</html>
