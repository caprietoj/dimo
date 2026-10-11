@extends('admin.layouts.app')

@section('title', 'Editar Rol - ' . $role->name)
@section('page_title', 'Editar Perfil de Rol')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.roles.index') }}">Roles</a></li>
    <li class="breadcrumb-item active">{{ $role->name }}</li>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-7 col-md-9">
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-edit text-primary mr-1"></i> Modificar Rol: {{ $role->name }}
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Volver a Roles
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                @csrf
                @method('PUT')
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
                                   value="{{ old('name', $role->name) }}" 
                                   required>
                        </div>
                        @error('name')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Identificador Técnico del Sistema (Slug)</label>
                        <div>
                            <code class="text-dark bg-light px-3 py-2 rounded border d-inline-block font-weight-bold">
                                {{ $role->slug }}
                            </code>
                        </div>
                        <small class="form-text text-muted">
                            Los identificadores internos del sistema se conservan para asegurar la integridad de la base de datos.
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="3">{{ old('description', $role->description) }}</textarea>
                        @error('description')
                            <span class="invalid-feedback d-block">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="p-3 bg-light rounded border text-muted small mt-4">
                        <div class="d-flex align-items-center mb-1">
                            <i class="fas fa-users text-primary mr-2"></i>
                            <strong>Usuarios asignados actualmente:</strong>
                            <span class="badge badge-info ml-2 font-weight-bold">{{ $role->users()->count() }}</span>
                        </div>
                        <div>Creado el: <strong>{{ $role->created_at ? $role->created_at->format('d/m/Y H:i') : 'N/A' }}</strong></div>
                        <div>Última actualización: <strong>{{ $role->updated_at ? $role->updated_at->format('d/m/Y H:i') : 'N/A' }}</strong></div>
                    </div>
                </div>

                <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.roles.index') }}" class="btn btn-default">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary font-weight-bold px-4">
                        <i class="fas fa-save mr-1"></i> Actualizar Rol
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
