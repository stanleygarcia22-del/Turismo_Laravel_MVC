@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col-12 text-center">
        <h1 class="display-5 fw-bold text-primary">Descubre El Salvador</h1>
        <p class="lead text-muted">Explora los mejores destinos turísticos cargados dinámicamente desde la capa de Modelo (JSON).</p>
    </div>
</div>

<div class="row g-4">
    @forelse($lugares as $lugar)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <img src="{{ $lugar['imagen'] }}" class="card-img-top" alt="{{ $lugar['titulo'] }}" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-info text-dark">{{ $lugar['categoria'] }}</span>
                        <small class="text-muted"><i class="bi bi-geo-alt"></i> {{ $lugar['departamento'] }}</small>
                    </div>
                    <h5 class="card-title fw-bold">{{ $lugar['titulo'] }}</h5>
                    <p class="card-text text-secondary small flex-grow-1">{{ Str::limit($lugar['descripcion'], 90) }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <span class="fw-bold text-success">
                            {{ $lugar['precio'] > 0 ? '$' . number_format($lugar['precio'], 2) : 'Entrada Libre' }}
                        </span>
                        <a href="{{ route('lugares.show', $lugar['id']) }}" class="btn btn-outline-primary btn-sm">Ver Detalle &raquo;</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">No hay destinos turísticos disponibles en este momento.</div>
        </div>
    @endforelse
</div>
@endsection