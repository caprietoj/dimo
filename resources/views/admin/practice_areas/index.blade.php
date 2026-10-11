@extends('admin.layouts.app')

@section('title', 'Áreas de Práctica')
@section('page_title', 'Áreas de Práctica Jurídica')

@section('breadcrumb')
    <li class="breadcrumb-item active">Áreas de Práctica</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-gavel text-primary mr-1"></i> Especialidades Legales Publicadas
                </h3>
                <div class="card-tools ml-auto">
                    <a href="{{ route('admin.practice-areas.create') }}" class="btn btn-primary btn-sm font-weight-bold">
                        <i class="fas fa-plus mr-1"></i> Nueva Área de Práctica
                    </a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead>
                            <tr class="bg-light">
                                <th style="width: 50px;">Orden</th>
                                <th style="width: 60px;">Icono</th>
                                <th>Título de la Especialidad</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th class="text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($areas as $area)
                            <tr>
                                <td class="text-center font-weight-bold text-muted">{{ $area->sort_order }}</td>
                                <td>
                                    <div class="p-2 rounded bg-light border text-center text-primary" style="width: 44px; height: 44px;">
                                        <span class="material-symbols-outlined text-2xl">{{ $area->icon ?: 'corporate_fare' }}</span>
                                    </div>
                                </td>
                                <td>
                                    <strong class="text-dark">{{ $area->title }}</strong>
                                    <br><small class="text-muted">Slug: {{ $area->slug }}</small>
                                </td>
                                <td>
                                    <span class="text-muted text-sm">{{ Str::limit($area->description, 90) }}</span>
                                </td>
                                <td>
                                    <span class="badge badge-{{ $area->is_active ? 'primary' : 'secondary' }} px-2 py-1">
                                        {{ $area->is_active ? 'Activa' : 'Inactiva' }}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.practice-areas.edit', $area->id) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.practice-areas.destroy', $area->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de eliminar esta área de práctica?');" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-secondary" title="Eliminar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="fas fa-gavel fa-3x mb-3 text-secondary"></i>
                                    <p class="mb-0">No hay áreas de práctica registradas.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
