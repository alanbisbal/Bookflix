@if (auth()->user()->es_admin)
    <a class="nav-link" href="{{route('administracion')}}">
        Tareas administrativas
    </a>
    <a class="nav-link" href="{{route('admin.estadisticas')}}">
        Ver Estadisticas
    </a>
@endif