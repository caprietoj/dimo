@extends('admin.layouts.app')

@section('title', 'Gestión de Usuarios')
@section('page_title', 'Usuarios y Control de Acceso')

@section('breadcrumb')
    <li class="breadcrumb-item active">Usuarios</li>
@endsection

@section('content')
<!-- Metric Cards & Actions -->
<div class="row mb-3">
    <div class="col-md-3 col-sm-6">
        <div class="small-box bg-info shadow-sm mb-2">
            <div class="inner">
                <h3>{{ $totalUsers }}</h3>
                <p>Usuarios Registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-users-cog"></i>
            </div>
            <a href="{{ route('admin.users.create') }}" class="small-box-footer">
                Nuevo usuario <i class="fas fa-plus-circle"></i>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="small-box bg-warning shadow-sm mb-2">
            <div class="inner">
                <h3>{{ $roles->count() }}</h3>
                <p>Roles Definidos</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-shield"></i>
            </div>
            <a href="{{ route('admin.roles.index') }}" class="small-box-footer">
                Gestionar roles <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-md-6 col-sm-12 d-flex align-items-center justify-content-md-end mt-2 mt-md-0">
        <div class="btn-group">
            <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary btn-sm mr-2 font-weight-bold">
                <i class="fas fa-shield-alt mr-1"></i> Ver Roles y Permisos
            </a>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm font-weight-bold">
                <i class="fas fa-user-plus mr-1"></i> Registrar Nuevo Usuario
            </a>
        </div>
    </div>
</div>

<!-- Users Table Card -->
<div class="card card-outline card-primary shadow-sm">
    <div class="card-header d-flex flex-wrap justify-content-between align-items-center py-2">
        <h3 class="card-title font-weight-bold mb-0">
            <i class="fas fa-users text-primary mr-1"></i> Cuentas de Acceso al Panel
        </h3>

        <!-- Search & Filter Form -->
        <form method="GET" action="{{ route('admin.users.index') }}" class="form-inline ml-auto mt-2 mt-sm-0">
            <div class="input-group input-group-sm mr-2">
                <select name="role" class="custom-select custom-select-sm" onchange="this.form.submit()">
                    <option value="">Todos los roles</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->slug }}" {{ request('role') === $role->slug ? 'selected' : '' }}>
                            {{ $role->name }} ({{ $role->users_count }})
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="input-group input-group-sm" style="width: 220px;">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre o email..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-default" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    @if(request()->hasAny(['search', 'role']))
                        <a href="{{ route('admin.users.index') }}" class="btn btn-default" title="Limpiar filtro">
                            <i class="fas fa-times"></i>
                        </a>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped mb-0">
                <thead>
                    <tr class="bg-light">
                        <th style="width: 50px;">ID</th>
                        <th>Usuario</th>
                        <th>Correo Electrónico</th>
                        <th>Rol Asignado</th>
                        <th>Fecha de Alta</th>
                        <th class="text-right" style="width: 150px;">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td class="font-weight-bold text-muted">{{ $user->id }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light border text-primary d-flex align-items-center justify-content-center mr-2 font-weight-bold" style="width: 36px; height: 36px; font-size: 0.85rem;">
                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                </div>
                                <div>
                                    <strong class="text-dark">{{ $user->name }}</strong>
                                    @if($user->id === auth()->id())
                                        <span class="badge badge-light border text-primary ml-1" style="font-size: 0.65rem;">(Su sesión)</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="mailto:{{ $user->email }}" class="text-primary font-weight-semibold">
                                {{ $user->email }}
                            </a>
                        </td>
                        <td>
                            @if($user->role === 'admin' || optional($user->roleModel)->slug === 'admin')
                                <span class="badge badge-primary px-2 py-1">
                                    <i class="fas fa-shield-alt mr-1"></i> {{ $user->role_display_name }}
                                </span>
                            @else
                                <span class="badge badge-secondary px-2 py-1">
                                    <i class="fas fa-user-tag mr-1"></i> {{ $user->role_display_name }}
                                </span>
                            @endif
                        </td>
                        <td>
                            <span class="text-muted text-sm">{{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : '-' }}</span>
                            <br><small class="text-muted">{{ $user->created_at ? $user->created_at->diffForHumans() : '' }}</small>
                        </td>
                        <td class="text-right text-nowrap">
                            <div class="d-inline-flex align-items-center justify-content-end">
                                <a href="{{ route('admin.users.edit', $user->id) }}" 
                                   class="btn btn-sm btn-light border text-primary shadow-none mr-2" 
                                   title="Editar datos y rol"
                                   style="width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 6px;"
                                   data-toggle="tooltip">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <button type="button" 
                                        class="btn btn-sm btn-light border text-warning shadow-none mr-2" 
                                        data-toggle="modal" 
                                        data-target="#passwordModal{{ $user->id }}" 
                                        title="Cambiar Contraseña"
                                        style="width: 32px; height: 32px; display: inline-flex; align-items: center; justify-content: center; border-radius: 6px;">
                                    <i class="fas fa-key"></i>
                                </button>

                                @if($user->id !== auth()->id())
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de eliminar al usuario {{ $user->name }}?');" class="d-inline m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-light border text-danger shadow-none" 
                                            title="Eliminar usuario"
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
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="fas fa-users-slash fa-3x mb-3 text-secondary"></i>
                            <p class="mb-0">No se encontraron usuarios que coincidan con la búsqueda.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($users->hasPages())
    <div class="card-footer bg-white clearfix">
        {{ $users->links() }}
    </div>
    @endif
</div>

<!-- Modales de Cambio Rápido de Contraseña (fuera de la tabla para evitar solapamientos) -->
@foreach($users as $user)
<div class="modal fade" id="passwordModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow">
            <form action="{{ route('admin.users.password', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-header bg-light py-2 px-3">
                    <h5 class="modal-title font-weight-bold text-dark" id="passwordModalLabel{{ $user->id }}" style="font-size: 0.95rem;">
                        <i class="fas fa-key text-primary mr-1"></i> Cambiar Contraseña: {{ $user->name }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-3">
                    <p class="text-muted text-xs mb-3">
                        Establezca una nueva clave de acceso para <strong>{{ $user->email }}</strong>. Mínimo 8 caracteres.
                    </p>
                    <div class="form-group mb-2">
                        <label for="password_{{ $user->id }}" class="font-weight-bold">Nueva Contraseña *</label>
                        <input type="password" name="password" id="password_{{ $user->id }}" class="form-control" placeholder="Mínimo 8 caracteres" required minlength="8">
                    </div>
                    <div class="form-group mb-2">
                        <label for="password_confirmation_{{ $user->id }}" class="font-weight-bold">Confirmar Nueva Contraseña *</label>
                        <input type="password" name="password_confirmation" id="password_confirmation_{{ $user->id }}" class="form-control" placeholder="Repita la contraseña" required minlength="8">
                    </div>
                </div>
                <div class="modal-footer bg-light py-2 px-3 justify-content-between">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold">
                        <i class="fas fa-save mr-1"></i> Actualizar Contraseña
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection
