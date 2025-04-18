// 🗺️ Inicialitzem el mapa centrant-lo en Alacant
const map = L.map('map').setView([38.345, -0.481], 14);

// 🧩 Afegim el mapa base d'OpenStreetMap
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap contributors'
}).addTo(map);

// 🔢 Funció per afegir punts amb números
function afegirPunt(lat, lng, nom, descripcio, iconaEmoji, numero) {
  const icona = L.divIcon({
    className: 'custom-icon',
    html: `<div style="font-size: 16px; font-weight: bold; background: white; border-radius: 50%; padding: 6px; border: 2px solid #333;">${numero}</div>`,
    iconSize: [30, 30],
    iconAnchor: [15, 30],
    popupAnchor: [0, -30]
  });

  L.marker([lat, lng], { icon: icona })
    .addTo(map)
    .bindPopup(`<strong>${nom}</strong><br>${descripcio}`);
}

// 📍 Punts de la ruta històrica
const puntsRuta = [
  [38.349002, -0.477583, 'Castell de Santa Bàrbara', 'Fortalesa d’origen àrab amb vistes panoràmiques.', '🏰'],
  [38.347811, -0.4832083, 'Ermita del Barri de Santa Creu', 'Carrers estrets, flors i essència medieval.', '🌸'],
  [38.2961, -0.4751, 'Pous de Garrigós', 'Antics pous per emmagatzemar aigua excavats a la roca.', '🕳️'],
  [38.3447, -0.4812, 'Basílica de Santa Maria', 'Església gòtica sobre l’antiga mesquita major.', '⛪'],
  [38.345409, -0.482755, 'Concatedral de Sant Nicolau', 'Cúpula blava i estil renaixentista.', '⛪'],
  [38.3444, -0.4821, 'La Rambla de Méndez Núñez', 'Eix divisori entre el casc antic i l’eixample.', '🛣️'],
  [38.344246, -0.483441, 'Portal d’Elx', 'Accés històric amb arbres centenaris i bancs modernistes.', '🌳'],
  [38.3439, -0.4852, 'Palau dels Labradores', 'Palauet barroc del segle XVIII.', '🏛️'],
  [38.3441, -0.4857, 'Palau Maisonnave', 'Seu de l’Arxiu Municipal d’Alacant.', '📚'],
  [38.32, -0.4815, 'Plaça de l’Ajuntament', 'Edifici barroc, escala noble i sala daurada.', '🏛️'],
  [38.3448, -0.4786, 'Casa Carbonell', 'Edifici modernista de 1924, símbol de la ciutat.', '🏠'],
  [38.3438, -0.4766, 'Porta del Mar', 'Placa enjardinada amb accés al port i mar.', '🚪'],
  [38.3449, -0.4833, 'Explanada d’Espanya', 'Passeig marítim amb mosaic ondulat i palmeres.', '🌴']
];

// 🔗 Coordenades per traçar la línia de la ruta
const coordenadesRuta = [];

// 🧭 Afegim els punts al mapa
puntsRuta.forEach((punt, index) => {
  const [lat, lng, nom, descripcio, emoji] = punt;
  afegirPunt(lat, lng, nom, descripcio, emoji, index + 1);
  coordenadesRuta.push([lat, lng]);
});

// ➰ Ruta dibuixada amb línia
const ruta = L.polyline(coordenadesRuta, {
  color: 'blue',
  weight: 4,
  opacity: 0.6
}).addTo(map);

// 🏹 Fletxes de direcció
L.polylineDecorator(ruta, {
  patterns: [
    {
      offset: '5%',
      repeat: '10%',
      symbol: L.Symbol.arrowHead({
        pixelSize: 10,
        polygon: false,
        pathOptions: { stroke: true, color: 'blue', weight: 2 }
      })
    }
  ]
}).addTo(map);
