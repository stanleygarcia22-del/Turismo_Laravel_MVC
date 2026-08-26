@extends('layouts.app')

@section('content')
<div class="mb-4">
    <a href="{{ route('lugares.index') }}" class="btn btn-secondary btn-sm">&laquo; Volver al catálogo</a>
</div>

<!-- Alerta de éxito del formulario -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row g-4">
    <!-- Información del Destino -->
    <div class="col-lg-7">
        <div class="card shadow-sm border-0 overflow-hidden">
            <img src="{{ $lugar['imagen'] }}" class="img-fluid" alt="{{ $lugar['titulo'] }}" style="max-height: 400px; width: 100%; object-fit: cover;">
            <div class="card-body p-4">
                <span class="badge bg-info text-dark mb-2">{{ $lugar['categoria'] }}</span>
                <h2 class="fw-bold">{{ $lugar['titulo'] }}</h2>
                <p class="text-muted mb-3">📍 Departamento: <strong>{{ $lugar['departamento'] }}</strong></p>
                <hr>
                <h5>Descripción</h5>
                <p class="text-secondary">{{ $lugar['descripcion'] }}</p>
                <div class="mt-4 p-3 bg-light rounded border">
                    <h6 class="mb-1 text-muted">Precio de Entrada:</h6>
                    <span class="fs-4 fw-bold text-success">
                        {{ $lugar['precio'] > 0 ? '$' . number_format($lugar['precio'], 2) : 'Gratis / Acceso Libre' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario de Contacto -->
    <div class="col-lg-5">
        <div class="card shadow-sm border-0 p-4">
            <h4 class="fw-bold mb-3">¿Te interesa este destino?</h4>
            <p class="text-muted small">Envía un mensaje para solicitar más información sobre excursiones o visitas guiadas.</p>

            <form action="{{ route('contacto.send') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre Completo</label>
                    <input type="text" name="nombre" id="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" required>
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea name="mensaje" id="mensaje" rows="4" class="form-control @error('mensaje') is-invalid @enderror" required>{{ old('mensaje') }}</textarea>
                    @error('mensaje')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Enviar Consulta</button>
            </form>
        </div>
    </div>
</div>
@endsection