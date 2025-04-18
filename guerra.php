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
    afegirPunt(38.357285, -0.469239, 'Camp de contrentació del Bon Hivern', 'Conegut per lobra de Max Aub Campo de los almendros.', '🏰');
    afegirPunt(38.353916, -0.465535, 'Barri de Santa Creu', 'Carrers estrets, flors i essència medieval.', '🌸');
    afegirPunt(38.352536, -0.468442, 'Pous de Garrigós', 'Antics pous per emmagatzemar aigua.', '🕳️');
    afegirPunt(38.344029, -0.479386, 'Ermita de Sant Roc', 'Església gòtica construïda sobre una mesquita.', '⛪');
    afegirPunt(38.348177, -0.486156, 'Església de Santa Maria', 'Església gòtica construïda sobre una mesquita.', '⛪');
    afegirPunt(38.345371, -0.482808, 'Concatedral de Sant Nicolau', 'Cúpula blava i estil renaixentista.', '⛪');
    afegirPunt(38.352624, -0.484520, 'Rambla de Méndez Núñez', 'Avinguda que divideix la ciutat antiga i moderna.', '🛣️');
    afegirPunt(38.347016, -0.485448, 'Portal d’Elx', 'Porta d’accés històrica amb arbres d’ombra.', '🌳');
    afegirPunt(38.351072, -0.490812, 'Palau dels Labradores', 'Palau barroc del s. XVIII.', '🏛️');
    afegirPunt(38.342582, -0.501916, 'Palau Maisonnave', 'Seu de l’Arxiu Municipal.', '📚');
    afegirPunt(38.344648, -0.512109, 'Plaça de l’Ajuntament', 'Edifici barroc amb salons històrics.', '🏛️');
  
  </script>
</body>
</html>
