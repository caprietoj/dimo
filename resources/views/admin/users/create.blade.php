@extends('admin.layouts.app')

@section('title', 'Nuevo Usuario')
@section('page_title', 'Crear Nuevo Usuario')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
    <li class="breadcrumb-item active">Nuevo</li>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-10">
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-user-plus text-primary mr-1"></i> Información del Nuevo Usuario
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Volver a Usuarios
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle mr-1"></i> Por favor verifique los errores en el formulario.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
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
                                           value="{{ old('name') }}" 
                                           placeholder="Ej: Laura Camila Díaz" 
                                           required>
                                </div>
                                @error('name')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
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
                                           value="{{ old('email') }}" 
                                           placeholder="ejemplo@dimo.com.co" 
                                           required>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback d-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="role_id">Rol Asignado <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-shield-alt"></i></span>
                            </div>
                            <select name="role_id" id="role_id" class="form-control custom-select @error('role_id') is-invalid @enderror" required>
                                <option value="">-- Seleccionar un Rol --</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                        {{ $role->name }} {{ $role->description ? '— ' . $role->description : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <small class="form-text text-muted">
                            El rol define el nivel de acceso y las funciones operativas del usuario dentro de la firma.
                        </small>
                        @error('role_id')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="card bg-light border mt-4 mb-2">
                        <div class="card-body py-3">
                            <h6 class="font-weight-bold text-dark mb-2">
                                <i class="fas fa-lock text-primary mr-1"></i> Asignación de Contraseña Inicial
                            </h6>
                            <p class="text-muted small mb-3">
                                Debe contener al menos 8 caracteres. El usuario podrá actualizarla posteriormente desde su perfil o el panel.
                            </p>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-md-0">
                                        <label for="password">Contraseña <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-key"></i></span>
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
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-0">
                                        <label for="password_confirmation">Confirmar Contraseña <span class="text-danger">*</span></label>
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
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-default">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary font-weight-bold px-4">
                        <i class="fas fa-save mr-1"></i> Registrar Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
