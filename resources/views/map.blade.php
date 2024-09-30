<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaflet Map with Multiple Pins</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map { height: 500px; }
        .custom-popup .leaflet-popup-content-wrapper {
            padding: 0;
            border-radius: 5px;
            overflow: hidden;
        }
        .custom-popup .leaflet-popup-content {
            margin: 0;
        }
        .custom-popup .card {
            width: 250px;
            border: none;
            box-shadow: none;
        }
        .custom-popup .card img {
            width: 100%;
            border-radius: 5px 5px 0 0;
        }
        .custom-popup .card-body {
            padding: 10px;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var greenIcon = L.icon({
    iconUrl: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Map_pin_icon_green.svg/94px-Map_pin_icon_green.svg.png?20160227175221',
    iconSize:     [38, 50], // size of the icon
    shadowSize:   [50, 64], // size of the shadow
    iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 62],  // the same for the shadow
    popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
        // Initialize the map
        var map = L.map('map').setView([7.8731, 80.7718], 7 ); // Centered on Sri Lanka

        // Add tile layer to the map
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        // --------------------------------------------------------------------------------

        // Custom popup content for the first marker
        var customPopup1 = `
            <div class="custom-popup">
                <div class="card">
                    <img src="path_to_your_image1.jpg" alt="Image">
                    <div class="card-body">
                        <h5 class="card-title">Your Title 1</h5>
                        <p class="card-text">Description for the first marker.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        `;

        // Add the first marker to the map
        var marker1 = L.marker([7.8731, 80.7718], {icon: greenIcon}).addTo(map);
        marker1.bindPopup(customPopup1);

        // Custom popup content for the second marker
        var customPopup2 = `
            <div class="custom-popup">
                <div class="card">
                    <img src="path_to_your_image2.jpg" alt="Image">
                    <div class="card-body">
                        <h5 class="card-title">Your Title 2</h5>
                        <p class="card-text">Description for the second marker.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        `;

        // Add the second marker to the map
        var marker2 = L.marker([6.9271, 79.8612]).addTo(map);
        marker2.bindPopup(customPopup2);

        // Custom popup content for the third marker
        var customPopup3 = `
            <div class="custom-popup">
                <div class="card">
                    <img src="path_to_your_image3.jpg" alt="Image">
                    <div class="card-body">
                        <h5 class="card-title">Your Title 3</h5>
                        <p class="card-text">Description for the third marker.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        `;

        // Add the third marker to the map
        var marker3 = L.marker([8.3564014, 80.510976]).addTo(map);
        marker3.bindPopup(customPopup3);
    </script>
</body>
</html>
