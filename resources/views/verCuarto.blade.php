@extends('layouts.layout')
@section('content')

<div class="container">
        <div class="row">
            <div class="col">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($imgs as $c)
                              <div class="carousel-item active">
                              <img src="{{$c->imagen}}" class="d-block w-100" height="400">
                              </div>
                              @endforeach
                        </div>
                    </div>
            </div>
        </div>

       
         
                
         

        <div class="row">
             <div class="col">
                    <div class="card" style="width: 100;">
                            
                            <div class="card-body">
                              <h5 class="card-title">Cuarto</h5>
                              @foreach ($datos as $c)
                              <input type="hidden" name="idc" value="{{$c->id}}">
                              <p class="card-text"> Solo se admiten : {{$c->sexo}}.  Pago mensual: ${{$c->precio_renta}}.00</p>
                              <p class="card-text"> Universidad cerca: {{$c->universidd}}</p>
                              @endforeach
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Servicios</h5>
                             <ul class="list-group list-group-flush">
                                    @foreach ($servicio as $c)
                              <li class="list-group-item">{{$c->nombre}}  -  {{$c->descripcion}}   -  {{$c->inluido}}</li>
                              @endforeach
                            </ul>
                          </div>

                         

                    </div>
             </div>
             
        </div>
        <div class="row">
            <div class="col">
                   <div class="card" style="width: 100;">
                        
                            <div class="card-body">
                                    <h5 class="card-title">Opiniones</h5>
                                    @foreach ($coment as $c)
                                    <ul class="list-group list-group-flush">
                                      <li class="list-group-item">{{$c->nombre}}  <br/> {{$c->descripcion}} </li>
                                    </ul>
                                    @endforeach
                                  </div>
                          </div>    
            </div>
            <div class="col">
                <div class="card" style="width: 100;">
                        
                        <div class="card-body">
                          <h5 class="card-title">Datos del dueño</h5>
                          @foreach ($arrend as $c)
                          <input type="hidden" name="idc" value="{{$c->id}}">
                          <p class="card-text"> {{$c->nombre}}.  </p>
                        <p class="card-text"> Nùmeros telefonicos: <br/>{{$c->telefono}} <br/> {{$c->telefono_emer}}</p>
                          @endforeach
                        </div>
                </div>
         </div>
        </div> 
        <div class="row">
          <div class="col-2">
              <button type="button" class="btn btn-warning">Rentar</button>
          </div>
        </div>
    </div>

      

@endsection