@extends('admin.layouts.app')

@section('title', 'Equipo Legal')
@section('page_title', 'Equipo Jurídico y Socios')

@section('breadcrumb')
    <li class="breadcrumb-item active">Equipo Legal</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-users text-primary mr-1"></i> Abogados Registrados en el Portal
                </h3>
                <div class="card-tools ml-auto">
                    <a href="{{ route('admin.team.create') }}" class="btn btn-primary btn-sm font-weight-bold">
                        <i class="fas fa-user-plus mr-1"></i> Nuevo Abogado
                    </a>
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead>
                            <tr class="bg-light">
                                <th style="width: 50px;">Orden</th>
                                <th style="width: 70px;">Foto</th>
                                <th>Nombre y Cargo</th>
                                <th>Frase / Cita de Autoridad</th>
                                <th>Contacto</th>
                                <th>Estado</th>
                                <th class="text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($members as $member)
                            <tr>
                                <td class="text-center font-weight-bold text-muted">{{ $member->sort_order }}</td>
                                <td>
                                    @if($member->image_url)
                                        <img src="{{ $member->image_url }}" alt="{{ $member->name }}" class="rounded-circle shadow-sm" style="width: 48px; height: 48px; object-fit: cover;">
                                    @else
                                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong class="text-dark">{{ $member->name }}</strong>
                                    <br><span class="badge badge-light border text-primary font-weight-bold">{{ $member->role }}</span>
                                </td>
                                <td>
                                    <span class="text-muted text-sm font-italic">"{{ Str::limit($member->quote, 75) }}"</span>
                                </td>
                                <td>
                                    @if($member->email)
                                        <div class="text-sm"><i class="fas fa-envelope text-muted mr-1"></i> {{ $member->email }}</div>
                                    @endif
                                    @if($member->linkedin_url && $member->linkedin_url !== '#')
                                        <div class="text-sm"><a href="{{ $member->linkedin_url }}" target="_blank" class="text-primary"><i class="fab fa-linkedin mr-1"></i> LinkedIn</a></div>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-{{ $member->is_active ? 'primary' : 'secondary' }} px-2 py-1">
                                        {{ $member->is_active ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.team.edit', $member->id) }}" class="btn btn-sm btn-outline-primary" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.team.destroy', $member->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de eliminar este miembro del equipo?');" class="d-inline">
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
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="fas fa-user-tie fa-3x mb-3 text-secondary"></i>
                                    <p class="mb-0">No hay abogados registrados en el equipo.</p>
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
