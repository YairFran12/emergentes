@extends('layouts.layout')
@section('content')

<div class="container">

    <div class="row">

        <div class="col">
            <div class="alert alert-secondary" role="alert">
                <p class="lead">Lo que escojas con tu corazón es lo que el universo va a escoger contigo</p>
            </div>
        </div>
    </div>

</div>

<div class="container">

    <div class="row">
        <div class="col">
            <div class="form-group col">
                <label for="inputState">Sexo</label>
                <select style="width:300px" id="sexo" name="sexo" class="form-control">
                    <option selected>Hombre</option>
                    <option>Mujer</option>
                </select>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label for="">Rango de precio</label>
                <div class="row">
                    <div class="col">
                        <input style="width:200px" type="number" class="form-control" id="minimo" name="minimo"
                            placeholder="Minimo">
                    </div>
                    <div class="col">
                        <input style="width:200px" type="number" class="form-control" id="maximo" name="maximo"
                            placeholder="Maximo">
                    </div>
                </div>

            </div>
        </div>


    </div>

    <div class="row">
        <div class="col" style=" margin:0 auto;">
            <div class="form-group col">
                <label for="inputState">Universidad</label>
                <select style="width:300px" id="universidad" name="universidad" class="form-control">
                    <option selected>ITO</option>
                    <option>UABJO</option>
                </select>
            </div>
        </div>
        <div class="col">
            <div class="col">
                <div class="form-group col">
                    <label for="inputState">Amueblado</label>
                    <select style="width:300px" id="inmueble" name="inmueble" class="form-control">
                        <option selected>1</option>
                        <option>0</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <br>
    <button onclick="nuevaBusqueda()" class="btn btn-info">Aceptar</button>
</div>


<br>
<div class="container">
    <div class="row">
        <div class="col">
            <div id="map" style="height: 600px; width:100% ">

            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>



<script type="text/javascript">
    var map;
var myLatLng;
var marcadores;


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
        crearMapa(myLatLng);
        //buscarAlrededores(myLatLng,"restaurant");
        //nuevaBusqueda();
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

});

        var sexo;
        var minimo;
        var maximo;
        var inmueble;
        var universidad;


function nuevaBusqueda() {

      
        sexo = document.getElementById('sexo').value;
        inmueble = document.getElementById('inmueble').value;
        minimo = document.getElementById('minimo').value;
        maximo = document.getElementById('maximo').value;
        universidad = document.getElementById('universidad').value;
        
        console.log(sexo);
        console.log(minimo);
        console.log(maximo);
        console.log(inmueble);
        

        if(minimo == ""){
            alert('Por favor selecciona un minimo');
        } else if(maximo == ""){
            alert('Por favor seleciona un maximo');
        } else if (minimo > maximo){
            alert('Numero maximo debe de ser mayor');
        } else {
             buscar();
             buscarUni();
        
        }
        
           
}



         function buscar() {
             

        $.post(
            "http://localhost:8000/api/filtrar/"+sexo+"/"+inmueble+"/"+minimo+"/"+maximo,
            
            function(match) {
                console.log(match);
                
                if(match.length == 0){
                    alert("No se encontraron coincidencias de cuantos, Intente de nuevo")
                }
                
                

                $.each(match, function(i, val) {
                    var glatval = val.lat;
                    var glngval = val.lng;
                    var gname = "cuarto"
                    var gid = val.id;
                    var GLatLng = new google.maps.LatLng(glatval, glngval);
                    var gicn =
                        "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";
                    crearMarcador(GLatLng, gicn, gname,gid);
                });
            }
        );
    }

    function buscarUni() {

        $.post(
            "http://localhost:8000/api/filtrarU/"+universidad,
            
            function(match) {
                console.log(match);
                $.each(match, function(i, val) {
                    var glatval = val.lat;
                    var glngval = val.lng;
                    var gname = val.name
                    var gid = val.id;
                    var GLatLng = new google.maps.LatLng(glatval, glngval);
                    var gicn =
                        "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png";
                    crearMarcador2(GLatLng, gicn, gname,gid);
                });
            }
        );
    }


    function crearMarcador(latLng, icn, name,id) {
        var cuarto ="cuartos";
        var contentString = `
<div>
        ${name}
        ${latLng}
        <br> <br>
        <a href="/cuartos/${id}" class="btn btn-dark"> Ver mas</a>
</div>
`;

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var marker = new google.maps.Marker({
            position: latLng,
            map: map,
            icon: icn,
            title: "Cuartos",
            animation: google.maps.Animation.DROP
        });
        marker.addListener("click", e => {
            infowindow.open(map, marker);
        });
    }



     function crearMarcador2(latLng, icn, name,id) {
        var cuarto ="cuartos";
        var contentString = `
<div>
        ${name}
        
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

</script>


@endsection