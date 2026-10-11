@extends('admin.layouts.app')

@section('title', 'Editar Abogado')
@section('page_title', 'Editar: ' . $teamMember->name)

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.team.index') }}">Equipo Legal</a></li>
    <li class="breadcrumb-item active">Editar</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-user-edit text-primary mr-1"></i> Modificar Ficha de {{ $teamMember->name }}
                </h3>
            </div>
            <form action="{{ route('admin.team.update', $teamMember->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="name" class="font-weight-bold">Nombre Completo y Título *</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $teamMember->name) }}" required>
                                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="role" class="font-weight-bold">Cargo / Rol *</label>
                                <input type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{ old('role', $teamMember->role) }}" required>
                                @error('role') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="quote" class="font-weight-bold">Cita o Filosofía Profesional</label>
                        <textarea name="quote" id="quote" rows="2" class="form-control @error('quote') is-invalid @enderror">{{ old('quote', $teamMember->quote) }}</textarea>
                        @error('quote') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="font-weight-bold">Correo Electrónico Directo</label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $teamMember->email) }}">
                                @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="linkedin_url" class="font-weight-bold">Enlace LinkedIn / Perfil</label>
                                <input type="text" name="linkedin_url" id="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror" value="{{ old('linkedin_url', $teamMember->linkedin_url) }}">
                                @error('linkedin_url') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    @include('admin.components.image-picker', [
                        'name' => 'image_url',
                        'fileInputName' => 'image_file',
                        'removeInputName' => 'remove_image_url',
                        'label' => 'Fotografía Profesional (HD)',
                        'aspect' => 'square',
                        'value' => old('image_url', $teamMember->getRawOriginal('image_url') ?? $teamMember->image_url),
                        'helpText' => 'Fotografía de alta calidad para renderizar en escala de grises con hover a color.'
                    ])

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sort_order" class="font-weight-bold">Orden de Aparición</label>
                                <input type="number" name="sort_order" id="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', $teamMember->sort_order) }}" min="0">
                                @error('sort_order') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="custom-control custom-switch mt-3">
                                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" {{ old('is_active', $teamMember->is_active) ? 'checked' : '' }}>
                                <label class="custom-control-label font-weight-bold" for="is_active">Activo en la web</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white d-flex justify-content-between py-2">
                    <a href="{{ route('admin.team.index') }}" class="btn btn-default btn-sm">
                        <i class="fas fa-times mr-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold">
                        <i class="fas fa-save mr-1"></i> Actualizar Abogado
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
