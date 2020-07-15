<div class="card cb2">
    <div class="card-header">
        <h5>Sección de novedades</h5>
    </div>
    <div class="tarjetasanidadas">
        @foreach($novedades as $novedad)
            <div class="text-dark tarjetaanidada-una">
                <div class="card-body">
                    <h5 class="card-title text-Left">{{$novedad->titulo}}</h5>
                    <p class="card-text text-center">{{$novedad->desc}}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
