@extends('layouts.app')
@section('titulo', $comercio->nombre_comercio)
@section('contenido')
    <h1>{{ $comercio->nombre_comercio }}</h1>
    <p>Rubro: {{ $comercio->rubro }}</p>
    {{-- ... el resto del contenido de la sección 7 va aquí ... --}}

    @if ($comercio->transacciones->count() === 0)
        <p>Este comercio es nuevo, aún no registra actividad.</p>
    @elseif ($comercio->transacciones->count() === 1)
        <p>Este comercio tiene su primera transaccion registrada.</p>
    @else
        <p>Este comercio tiene un historial de {{ $comercio->transacciones->count() }} transacciones.</p>
    @endif

    @forelse ($comercio->transacciones as $transaccion)
    <div class="transaccion">
    <strong>${{ $transaccion->monto }} {{ $transaccion->moneda }}</strong>
    — {{ $transaccion->cliente_nombre }}
    <x-badge-estado :estado="$transaccion->estado" />
    </div>
    @empty
    <p>Este comercio aún no registra transacciones.</p>
    @endforelse

@endsection

