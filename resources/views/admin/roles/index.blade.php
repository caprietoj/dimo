@extends('admin.layouts.app')

@section('title', 'Gestión de Roles')
@section('page_title', 'Roles y Perfiles de Acceso')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
    <li class="breadcrumb-item active">Roles</li>
@endsection

@section('content')
<!-- Metrics and Actions -->
<div class="row mb-3">
    <div class="col-md-3 col-sm-6">
        <div class="small-box bg-info shadow-sm mb-2">
            <div class="inner">
                <h3>{{ $roles->count() }}</h3>
                <p>Roles Definidos</p>
            </div>
            <div class="icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <a href="{{ route('admin.roles.create') }}" class="small-box-footer">
                Crear nuevo rol <i class="fas fa-plus-circle"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="small-box bg-success shadow-sm mb-2">
            <div class="inner">
                <h3>{{ $totalUsers }}</h3>
                <p>Usuarios en el Sistema</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('admin.users.index') }}" class="small-box-footer">
                Ver usuarios <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-md-end mt-2 mt-md-0">
        <div class="btn-group">
            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm mr-2 font-weight-bold">
                <i class="fas fa-users mr-1"></i> Lista de Usuarios
            </a>
            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary btn-sm font-weight-bold">
                <i class="fas fa-plus-circle mr-1"></i> Crear Nuevo Rol
            </a>
        </div>
    </div>
</div>

<!-- Roles Table Card -->
<div class="card card-outline card-primary shadow-sm">
    <div class="card-header py-2 d-flex justify-content-between align-items-center">
        <h3 class="card-title font-weight-bold mb-0">
            <i class="fas fa-id-badge text-primary mr-1"></i> Catálogo de Roles Operativos
        </h3>
        <span class="badge badge-light border text-muted">
            {{ $roles->count() }} roles configurados
        </span>
    </div>

    <div class="card-body p-0 table-responsive">
        <table class="table table-hover table-striped align-middle mb-0">
            <thead class="thead-light">
                <tr>
                    <th style="width: 50px;" class="text-center">#</th>
                    <th style="width: 220px;">Rol</th>
                    <th style="width: 160px;">Identificador</th>
                    <th>Descripción</th>
                    <th style="width: 150px;" class="text-center">Usuarios Asignados</th>
                    <th style="width: 140px;" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($roles as $role)
                    <tr>
                        <td class="text-center text-muted font-weight-bold">
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <span class="badge badge-primary px-2 py-1 mr-2" style="font-size: 0.82rem;">
                                    <i class="fas fa-shield-alt mr-1"></i>
                                    {{ $role->name }}
                                </span>
                            </div>
                        </td>
                        <td>
                            <code class="text-dark bg-light px-2 py-1 rounded border small">
                                {{ $role->slug }}
                            </code>
                        </td>
                        <td class="text-muted">
                            {{ $role->description ?: 'Sin descripción detallada.' }}
                        </td>
                        <td class="text-center">
                            @if($role->users_count > 0)
                                <a href="{{ route('admin.users.index', ['role' => $role->slug]) }}" 
                                   class="badge badge-info px-2 py-1 text-white font-weight-bold" 
                                   title="Filtrar usuarios con este rol">
                                    <i class="fas fa-users mr-1"></i> {{ $role->users_count }} {{ Str::plural('usuario', $role->users_count) }}
                                </a>
                            @else
                                <span class="badge badge-secondary px-2 py-1">
                                    0 usuarios
                                </span>
                            @endif
                        </td>
                        <td class="text-center text-nowrap">
                            <div class="d-inline-flex align-items-center justify-content-center">
                                <a href="{{ route('admin.roles.edit', $role) }}" 
                                   class="btn btn-sm btn-light border text-primary shadow-none mr-2" 
                                   title="Editar rol"
                                   style="width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 6px;">
                                    <i class="fas fa-edit"></i>
                                </a>

                                @if($role->slug === 'admin')
                                    <button type="button" 
                                            class="btn btn-sm btn-light border text-muted shadow-none" 
                                            disabled 
                                            title="El rol Administrador del sistema no puede eliminarse"
                                            style="width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 6px; opacity: 0.6;">
                                        <i class="fas fa-lock"></i>
                                    </button>
                                @elseif($role->users_count > 0)
                                    <button type="button" 
                                            class="btn btn-sm btn-light border text-muted shadow-none" 
                                            disabled 
                                            title="No se puede eliminar: tiene {{ $role->users_count }} usuarios vinculados"
                                            style="width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 6px; opacity: 0.6;">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                @else
                                    <form action="{{ route('admin.roles.destroy', $role) }}" 
                                          method="POST" 
                                          class="d-inline m-0"
                                          onsubmit="return confirm('¿Está seguro de eliminar el rol {{ $role->name }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn btn-sm btn-light border text-danger shadow-none" 
                                                title="Eliminar rol"
                                                style="width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 6px;">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">
                            <i class="fas fa-info-circle fa-2x mb-2 text-primary d-block"></i>
                            No hay roles registrados en el sistema.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
