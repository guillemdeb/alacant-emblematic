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
        iconSize: [30, 30],
        iconAnchor: [15, 30],
        popupAnchor: [0, -30]
      });

      L.marker([lat, lng], { icon: icona })
        .addTo(map)
        .bindPopup(`<strong>${nom}</strong><br>${descripcio}`);
    }

    // 📍 Llista de punts
    afegirPunt(38.2906, -0.4953, 'Castell de Santa Bàrbara', 'Fortalesa d’origen àrab amb vistes panoràmiques.', '🏰');
    afegirPunt(38.2919, -0.4933, 'Barri de Santa Creu', 'Carrers estrets, flors i essència medieval.', '🌸');
    afegirPunt(38.2961, -0.4751, 'Pous de Garrigós', 'Antics pous per emmagatzemar aigua.', '🕳️');
    afegirPunt(38.3447, -0.4812, 'Església de Santa Maria', 'Església gòtica construïda sobre una mesquita.', '⛪');
    afegirPunt(38.3441, -0.4849, 'Concatedral de Sant Nicolau', 'Cúpula blava i estil renaixentista.', '⛪');
    afegirPunt(38.3444, -0.4821, 'Rambla de Méndez Núñez', 'Avinguda que divideix la ciutat antiga i moderna.', '🛣️');
    afegirPunt(38.3473, -0.4827, 'Portal d’Elx', 'Porta d’accés històrica amb arbres d’ombra.', '🌳');
    afegirPunt(38.3439, -0.4852, 'Palau dels Labradores', 'Palau barroc del s. XVIII.', '🏛️');
    afegirPunt(38.3441, -0.4857, 'Palau Maisonnave', 'Seu de l’Arxiu Municipal.', '📚');
    afegirPunt(38.3450, -0.4793, 'Plaça de l’Ajuntament', 'Edifici barroc amb salons històrics.', '🏛️');
    afegirPunt(38.3448, -0.4786, 'Casa Carbonell', 'Edifici modernista emblemàtic d’Alacant.', '🏠');
    afegirPunt(38.3438, -0.4766, 'Porta del Mar', 'Espai enjardinat on s’alçava una porta històrica.', '🚪');
    afegirPunt(38.3449, -0.4833, 'Explanada d’Espanya', 'Passeig marítim de mosaic ondulat.', '🌊');
  </script>
</body>
</html>
