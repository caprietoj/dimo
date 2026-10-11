@extends('admin.layouts.app')

@section('title', 'Editar Usuario - ' . $user->name)
@section('page_title', 'Editar Usuario')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
    <li class="breadcrumb-item active">{{ $user->name }}</li>
@endsection

@section('content')
<div class="row">
    <!-- Main Info & Role Column -->
    <div class="col-lg-7">
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-user-edit text-primary mr-1"></i> Información General y Rol
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Volver a Usuarios
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre Completo <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $user->name) }}" 
                                   required>
                        </div>
                        @error('name')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Correo Electrónico <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $user->email) }}" 
                                   required>
                        </div>
                        @error('email')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="role_id">Rol en la Firma <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-shield-alt"></i></span>
                            </div>
                            <select name="role_id" id="role_id" class="form-control custom-select @error('role_id') is-invalid @enderror" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }} {{ $role->description ? '— ' . $role->description : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <small class="form-text text-muted">
                            Define el conjunto de privilegios operativos del usuario.
                        </small>
                        @error('role_id')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="p-3 bg-light rounded border text-muted small mt-4">
                        <div class="d-flex align-items-center mb-1">
                            <i class="fas fa-info-circle text-primary mr-2"></i>
                            <strong>Detalles de Cuenta:</strong>
                        </div>
                        <div>Registrado el: <strong>{{ $user->created_at ? $user->created_at->format('d/m/Y H:i') : 'N/A' }}</strong></div>
                        <div>Última actualización: <strong>{{ $user->updated_at ? $user->updated_at->format('d/m/Y H:i') : 'N/A' }}</strong></div>
                    </div>
                </div>

                <div class="card-footer bg-white d-flex justify-content-between">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-default">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary font-weight-bold">
                        <i class="fas fa-save mr-1"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Password Change Column -->
    <div class="col-lg-5">
        <div class="card card-outline card-warning shadow-sm">
            <div class="card-header">
                <h3 class="card-title font-weight-bold text-dark">
                    <i class="fas fa-key text-warning mr-1"></i> Cambiar Contraseña
                </h3>
            </div>

            <form action="{{ route('admin.users.password', $user) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <p class="text-muted small mb-3">
                        Actualice la credencial de acceso para <strong>{{ $user->name }}</strong>. La nueva contraseña debe tener mínimo 8 caracteres.
                    </p>

                    <div class="form-group">
                        <label for="password">Nueva Contraseña <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   id="password" 
                                   name="password" 
                                   placeholder="Mínimo 8 caracteres" 
                                   required>
                        </div>
                        @error('password')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-0">
                        <label for="password_confirmation">Confirmar Nueva Contraseña <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-check-double"></i></span>
                            </div>
                            <input type="password" 
                                   class="form-control" 
                                   id="password_confirmation" 
                                   name="password_confirmation" 
                                   placeholder="Repita la contraseña" 
                                   required>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white text-right">
                    <button type="submit" class="btn btn-warning text-dark font-weight-bold">
                        <i class="fas fa-lock mr-1"></i> Actualizar Contraseña
                    </button>
                </div>
            </form>
        </div>

        @if(auth()->id() !== $user->id)
            <div class="card card-outline card-danger shadow-sm mt-3">
                <div class="card-body py-3 d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="font-weight-bold text-danger mb-0">Eliminar Cuenta</h6>
                        <small class="text-muted">Esta acción revocará todo acceso a este usuario.</small>
                    </div>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('¿Está completamente seguro de eliminar al usuario {{ $user->name }}? Esta acción es irreversible.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm font-weight-bold">
                            <i class="fas fa-trash-alt mr-1"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
