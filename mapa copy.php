<!DOCTYPE html>
<html lang="ca">
<head>
  <meta charset="utf-8">
  <title>Ruta Històrica d'Alacant</title>
  <link rel="icon" type="image/vnd.icon" href="img/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
  <link rel="icon" type="image/vnd.icon" sizes="32x32" href="img/favicon-32x32.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Estils i Leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <style>
    #map {
      height: 100vh;
    }
  </style>
</head>
<body>
  <div id="map"></div>

  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    // Inicialitzem el mapa centrat a Alacant
    const map = L.map('map').setView([38.3449, -0.4830], 15);

    // Afegim capa base OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    // Funció utilitat per afegir punts amb icona personalitzada
    function afegirPunt(lat, lng, nom, descripcio, iconaEmoji) {
      const icona = L.divIcon({
        className: 'custom-icon',
        html: `<div style="font-size: 24px;">${iconaEmoji}</div>`,
        iconSize: [40, 40],
        iconAnchor: [25, 40],
        popupAnchor: [0, -40]
      });

      L.marker([lat, lng], { icon: icona })
        .addTo(map)
        .bindPopup(`<strong>${nom}</strong><br>${descripcio}`);
    }

    // 📍 Llista de punts
    afegirPunt(38.349116, -0.47764, 'Castell de Santa Bàrbara', 'Fortalesa d’origen àrab amb vistes panoràmiques.', '🏰');
    afegirPunt(38.347631, -0.482658, 'Barri de Santa Creu', 'Carrers estrets, flors i essència medieval.', '🌸');
    afegirPunt(38.346606, -0.480440, 'Pous de Garrigós', 'Antics pous per emmagatzemar aigua.', '🕳️');
    afegirPunt(38.347214, -0.481824, 'Ermita de Sant Roc', 'Església gòtica construïda sobre una mesquita.', '⛪');
    afegirPunt(38.346070, -0.479525, 'Església de Santa Maria', 'Església gòtica construïda sobre una mesquita.', '⛪');
    afegirPunt(38.345371, -0.482808, 'Concatedral de Sant Nicolau', 'Cúpula blava i estil renaixentista.', '⛪');
    afegirPunt(38.344526, -0.483345, 'Rambla de Méndez Núñez', 'Avinguda que divideix la ciutat antiga i moderna.', '🛣️');
    afegirPunt(38.344246, -0.483441, 'Portal d’Elx', 'Porta d’accés històrica amb arbres d’ombra.', '🌳');
    afegirPunt(38.346148, -0.483420, 'Palau dels Labradores', 'Palau barroc del s. XVIII.', '🏛️');
    afegirPunt(38.345927, -0.483278, 'Palau Maisonnave', 'Seu de l’Arxiu Municipal.', '📚');
    afegirPunt(38.345047, -0.481151, 'Plaça de l’Ajuntament', 'Edifici barroc amb salons històrics.', '🏛️');
    afegirPunt(38.344475 -0.4780952, 'Casa Carbonell', 'Edifici modernista emblemàtic d’Alacant.', '🏠');
    afegirPunt(38.344414, -0.480443, 'Porta del Mar', 'Espai enjardinat on s’alçava una porta històrica.', '🚪');
    afegirPunt(38.344197, -0.480813, 'Explanada d’Espanya', 'Passeig marítim de mosaic ondulat.', '🌊'); 
    afegirPunt(38.348680, -0.474695, 'Ermita del Raval Roig', 'explicació de la ciutat.', '⛪');
  </script>
</body>
</html>
