var map;
var myLatLng;
var marcadores;
var ubicacion = new google.maps.LatLng(17.078669, -96.74452);
var longitud = -96.74452;
var latitud = 17.078669;

$(document).ready(function() {
    geoLocationInit();

    function geoLocationInit() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, fail);
        } else {
            alert("Navegador no soportado");
        }
    }

    //Pregunta si encuentra una ubicacion
    //function geoLocationInit() {
    //    if (navigator.geolocation) {
    //        navigator.geolocation.getCurrentPosition(success, fail);
    //    } else {
    //        alert("Navegador no soportado");
    //    }
    //}

    function success(position) {
        var latval = position.coords.latitude;
        var lngval = position.coords.longitude;

        console.log([latval, lngval]);

        myLatLng = new google.maps.LatLng(latval, lngval);
        crearMapa(ubicacion);
        //buscarAlrededores(myLatLng,"restaurant");
        nuevaBusqueda(latitud, longitud);
    }

    function fail() {
        alert("Algo salio mal");
    }

    //Crear Mapa
    function crearMapa(myLatLng) {
        map = new google.maps.Map(document.getElementById("map"), {
            center: myLatLng,
            zoom: 15
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            animation: google.maps.Animation.DROP
        });

        marker.addListener("click", e => {
            console.log(e);
        });
    }

    //var map = new google.maps.Map(document.getElementById("map"), {
    //    center: myLatLng,
    //    zoom: 8
    //});

    //Crear Marcador
    function crearMarcador(latLng, icn, name,id) {
        var contentString = `
<div>
        ${name}
        ${latLng}
        <br> <br>
        <a href="${id}" class="btn btn-dark"> Ver mas</a>
</div>
`;

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            icon: icn,
            title: name,
            animation: google.maps.Animation.DROP
        });
        marker.addListener("click", e => {
            infowindow.open(map, marker);
        });
    }

    //var marker = new google.maps.Marker({
    //    position: myLatLng,
    //    map: map,
    //    title: "Hello World!"
    // });

    //Buscar Alrededores
    function buscarAlrededores(myLatLng, type) {
        var request = {
            location: myLatLng,
            radius: "1500",
            type: [type]
        };

        service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request, callback);

        function callback(results, status) {
            console.log(results);

            if (status == google.maps.places.PlacesServiceStatus.OK) {
                for (var i = 0; i < results.length; i++) {
                    var place = results[i];
                    latLng = place.geometry.location;
                    icn = place.icon;
                    name = place.name;
                    crearMarcador(latLng, icn, name);
                }
            }
        }
    }
    //var request = {
    //    location: myLatLng,
    //    radius: "500",
    //    type: ["restaurant"]
    //};

    function nuevaBusqueda(lat, lng) {
        $.post(
            "http://localhost:8000/api/buscar",
            { lat: lat, lng: lng },
            function(match) {
                console.log(match);
                $.each(match, function(i, val) {
                    var glatval = val.lat;
                    var glngval = val.lng;
                    var gname = val.name;
                    var gid = val.id;
                    var GLatLng = new google.maps.LatLng(glatval, glngval);
                    var gicn =
                        "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";
                    crearMarcador(GLatLng, gicn, gname,gid);
                });
            }
        );
    }
});
