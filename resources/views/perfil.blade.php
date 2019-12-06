@extends('layouts.layout')
@section('content')


<div class="container">

    <div class="row">
        <div class="col fa-border">
            <img src="{{asset('images/user.png')}}" width="80" height="80" alt="">
            <br>
            <h4> Yair Francisco </h4>

        </div>


    </div>
    <br>

    <p>Configuracion de la cuenta </p>

    <div class="row">
        <div class="col-12">
            <div class="list-group" role="tablist">
                <a class="list-group-item list-group-item-action"  href="/datosFor" role="tab"> <i
                        class="far fa-user"> &nbsp;&nbsp; Informacion personal </i></a>
                <a class="list-group-item list-group-item-action"  href="/reserva"
                    role="tab"><i class="far fa-clipboard"></i> &nbsp;&nbsp;&nbsp;Reservaciones</a>
                <a class="list-group-item list-group-item-action" href="#list-messages"
                    role="tab"><i class="far fa-money-bill-alt"></i>&nbsp;&nbsp;Pagos</a>
                <a class="list-group-item list-group-item-action" href="/historial" role="tab"><i
                        class="fas fa-history"></i>&nbsp;&nbsp;&nbsp;Historial</a>
                
            </div>
        </div>
    </div>

    <br>

    <p> Ayuda </p>

    <div class="row">
        <div class="col-12">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list"
                    href="#list-home" role="tab"> <i class="far fa-question-circle"></i> &nbsp;&nbsp; Ayuda </i></a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                    href="#list-profile" role="tab"><i class="far fa-comments"></i> &nbsp;&nbsp;&nbsp;Envíanos tus
                    comentarios</a>
            </div>
        </div>
    </div>

    <br>

    <p> Legal </p>

    <div class="row">
        <div class="col-12">
            <div class="list-group" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list"
                    href="#list-home" role="tab"> <i class="far fa-file-alt"></i> &nbsp;&nbsp; Terminos de servicio
                    </i></a>
            </div>
        </div>
    </div>
</div>




@endsection