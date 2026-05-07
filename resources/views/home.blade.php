@extends('layouts.app')

@section('content')

<div class="container py-4">

    <!-- HEADER DEL DASHBOARD -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="p-4 bg-white rounded shadow-sm d-flex justify-content-between align-items-center">

                <div>
                    <h4 class="mb-1">Dashboard</h4>
                    <p class="text-muted mb-0">
                        Bienvenido al sistema de control
                    </p>
                </div>

                <div class="text-end">
                    <span class="badge bg-success p-2">
                        Usuario activo
                    </span>
                </div>

            </div>
        </div>
    </div>

    <!-- ALERTA DE ESTADO -->
    @if (session('status'))
        <div class="alert alert-success shadow-sm">
            {{ session('status') }}
        </div>
    @endif

    <!-- CONTENIDO PRINCIPAL -->
    <div class="row g-4">

        <!-- CARD USUARIO -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0">

                <div class="card-body">
                    <h5 class="card-title">Usuario</h5>

                    <p class="text-muted mb-2">
                        Información de sesión actual
                    </p>

                    <hr>

                    <p class="mb-1"><strong>Estado:</strong> Conectado</p>
                    <p class="mb-1"><strong>Acceso:</strong> Permitido</p>
                </div>

            </div>
        </div>

        <!-- CARD SISTEMA -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0">

                <div class="card-body">
                    <h5 class="card-title">Sistema</h5>

                    <p class="text-muted mb-2">
                        Estado general del sistema
                    </p>

                    <hr>

                    <p class="mb-1"><strong>Servidor:</strong> Activo</p>
                    <p class="mb-1"><strong>Base de datos:</strong> Conectada</p>
                </div>

            </div>
        </div>

        <!-- CARD ACTIVIDAD -->
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0">

                <div class="card-body">
                    <h5 class="card-title">Actividad</h5>

                    <p class="text-muted mb-2">
                        Resumen rápido
                    </p>

                    <hr>

                    <p class="mb-1"><strong>Sesión:</strong> Activa</p>
                    <p class="mb-1"><strong>Último acceso:</strong> Ahora</p>
                </div>

            </div>
        </div>

    </div>

    <!-- BLOQUE FINAL -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="p-4 bg-white rounded shadow-sm">

                <h5>Acciones rápidas</h5>

                <p class="text-muted">
                    Desde aquí puedes gestionar el sistema o cerrar sesión.
                </p>

                <a href="#" class="btn btn-primary me-2">
                    Ir a configuración
                </a>

                <a href="{{ route('logout') }}"
                   class="btn btn-outline-danger"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Cerrar sesión
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </div>
    </div>

</div>

@endsection