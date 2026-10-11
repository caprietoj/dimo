@extends('admin.layouts.app')

@section('title', 'Nuevo Rol')
@section('page_title', 'Crear Nuevo Rol')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
    <li class="breadcrumb-item active">Nuevo</li>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7 col-md-9">
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-plus-circle text-primary mr-1"></i> Definir Perfil de Rol
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Volver a Roles
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.roles.store') }}" method="POST">
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

                    <div class="form-group">
                        <label for="name">Nombre del Rol <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-shield-alt"></i></span>
                            </div>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   placeholder="Ej: Asistente Jurídico, Auditor, etc." 
                                   required>
                        </div>
                        <small class="form-text text-muted">
                            El identificador único (slug) se generará automáticamente a partir del nombre.
                        </small>
                        @error('name')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción del Rol</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="3" 
                                  placeholder="Detalle el alcance y responsabilidades que tendrá este perfil...">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-default">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary font-weight-bold px-4">
                        <i class="fas fa-save mr-1"></i> Guardar Rol
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
