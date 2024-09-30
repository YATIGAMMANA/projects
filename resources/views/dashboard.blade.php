

@extends('layouts.admin')

@section('content')
<x-app-layout>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        #map {
            height: 500px;
        }

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

        .custom-popup .view-more-btn {
            margin-top: 15px; 
        }

        .carousel-container {
            margin-bottom: 15px; 
        }

    </style>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var greenIcon = L.icon({
                iconUrl: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Map_pin_icon_green.svg/94px-Map_pin_icon_green.svg.png?20160227175221',
                iconSize: [38, 50],
                shadowSize: [50, 64],
                iconAnchor: [22, 94],
                shadowAnchor: [4, 62],
                popupAnchor: [-3, -76]
            });

            // Initialize the map
            var map = L.map('map').setView([7.8731, 80.7718], 7);

            // Add tile layer to the map
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            // Add markers and popups
            @foreach($locationImages as $locationImage)
            var images = `{{ $locationImage->image }}`.split(',');
            var renderimg = '';

            if (images.length > 1) {
                renderimg = `<div class="carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>`;
                
                for (let i = 0; i < images.length; i++) {
                    console.log(images[i]);
                    renderimg += `
                    <div class="carousel-cell" style="height: 250px;">
                        <img src="storage/assets/images/`+ images[i] +`" alt="{{ $locationImage->title }}">
                    </div>`;
                }
                renderimg += `</div>`;
            } else {
                renderimg = `<img src="storage/assets/images/{{ $locationImage->image }}" alt="{{ $locationImage->title }}">`;
            }

            var customPopup2 = `
                <div class="custom-popup">
                    <div class="card">
                        <div class="location-item">
                            <h2>{{ $locationImage->title }}</h2>
                            <p>{{ $locationImage->description }}</p>
                            <div class="carousel-container">` + renderimg + `</div>
                        </div>
                    </div>
                        </div>
                             <button type="button" class="btn btn-primary btn-sm" onclick="navigateToDetail('{{ $locationImage->title }}')">View more</button>
                        </div>
                </div>`;

            var marker2 = L.marker([{{ $locationImage->longitude }}, {{ $locationImage->latitude }}], {icon: greenIcon}).addTo(map);
            marker2.bindPopup(customPopup2);
            @endforeach

            // Initialize Flickity after popups are added
            map.on('popupopen', function() {
                var carousels = document.querySelectorAll('.carousel');
                carousels.forEach(function(carousel) {
                    new Flickity(carousel, {
                        cellAlign: 'left',
                        contain: true
                    });
                });
            });
        });

        function navigateToDetail(title) {
            console.log('navigate function :::::', title)
            window.location.href = `/details/${title}`;
        }
    </script>
</x-app-layout>
@endsection


