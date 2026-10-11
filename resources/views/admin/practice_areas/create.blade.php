@extends('admin.layouts.app')

@section('title', 'Crear Área de Práctica')
@section('page_title', 'Nueva Área de Práctica')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.practice-areas.index') }}">Áreas de Práctica</a></li>
    <li class="breadcrumb-item active">Nueva</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-plus-circle text-primary mr-1"></i> Información del Área Jurídica
                </h3>
            </div>
            <form action="{{ route('admin.practice-areas.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title" class="font-weight-bold">Título del Área *</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Ej: Derecho Corporativo, Litigios y Arbitraje" value="{{ old('title') }}" required>
                        @error('title') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="font-weight-bold">Descripción *</label>
                        <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Breve resumen de los servicios ofrecidos en esta área..." required>{{ old('description') }}</textarea>
                        @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="icon" class="font-weight-bold">Icono (Material Symbol)</label>
                                <input type="text" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" placeholder="corporate_fare, account_balance, work, real_estate_agent" value="{{ old('icon', 'corporate_fare') }}">
                                <small class="text-muted">Nombre del icono de Material Symbols (Google Fonts).</small>
                                @error('icon') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sort_order" class="font-weight-bold">Orden de Aparición</label>
                                <input type="number" name="sort_order" id="sort_order" class="form-control @error('sort_order') is-invalid @enderror" value="{{ old('sort_order', 1) }}" min="0">
                                @error('sort_order') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" value="1" checked>
                            <label class="custom-control-label font-weight-bold" for="is_active">Mostrar en el sitio web (Activa)</label>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-white d-flex justify-content-between py-2">
                    <a href="{{ route('admin.practice-areas.index') }}" class="btn btn-default btn-sm">
                        <i class="fas fa-times mr-1"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold">
                        <i class="fas fa-save mr-1"></i> Guardar Área
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
