<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="#">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/weather-icon/css/weather-icons-wind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('modules/summernote/summernote-bs4.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/components.css') }}">

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    
</head>

<body>
    @yield('content')

    <!-- JS Libraies -->
    <script src="{{ asset('modules/jquery.min.js') }}"></script>
    <script src="{{ asset('modules/popper.js') }}"></script>
    <script src="{{ asset('modules/tooltip.js') }}"></script>
    <script src="{{ asset('modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('modules/moment.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>
    <script src="{{ asset('modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('modules/chart.min.js') }}"></script>
    <script src="{{ asset('modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKPIAi_xftVsfEB91l0FbEyadWxBzkWgs"></script>
    <script>
        let map, marker;

        function initMap() {
            const initialPosition = { lat: 7.116816, lng: -73.105240 };

            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: initialPosition
            });

            marker = new google.maps.Marker({
                position: initialPosition,
                map: map,
                title: "Ubicación del vehículo"
            });

            fetchLocationUpdates();
        }

        function updateMarker(position) {
            marker.setPosition(position);
            map.setCenter(position);
        }

        function fetchLocationUpdates() {
            setInterval(async () => {
                const response = await fetch('/ubicacion');
                const data = await response.json();
                updateMarker({ lat: data.lat, lng: data.lng });
            }, 3000);
        }
    </script>
    @yield('executeMapScript')

</body>
</html>
