@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page_title', 'Tablero Principal')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info shadow-sm">
            <div class="inner">
                <h3>{{ $totalMessages }}</h3>
                <p>Consultas Totales</p>
            </div>
            <div class="icon">
                <i class="fas fa-envelope"></i>
            </div>
            <a href="{{ route('admin.messages.index') }}" class="small-box-footer">
                Ver todas <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning shadow-sm">
            <div class="inner">
                <h3>{{ $pendingMessages }}</h3>
                <p>Por Atender (Pendientes)</p>
            </div>
            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
            <a href="{{ route('admin.messages.index', ['status' => 'pending']) }}" class="small-box-footer">
                Filtrar pendientes <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success shadow-sm">
            <div class="inner">
                <h3>{{ $totalPracticeAreas }}</h3>
                <p>Áreas de Práctica</p>
            </div>
            <div class="icon">
                <i class="fas fa-balance-scale"></i>
            </div>
            <a href="{{ route('admin.practice-areas.index') }}" class="small-box-footer">
                Gestionar áreas <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger shadow-sm">
            <div class="inner">
                <h3>{{ $totalTeamMembers }}</h3>
                <p>Abogados / Socios</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-tie"></i>
            </div>
            <a href="{{ route('admin.team.index') }}" class="small-box-footer">
                Gestionar equipo <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->

<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-8 connectedSortable">
        <!-- RECENT MESSAGES CARD -->
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header border-transparent">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-inbox text-primary mr-1"></i> Solicitudes de Consulta Recientes
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.messages.index') }}" class="btn btn-tool btn-sm text-primary font-weight-bold">
                        Ver todas
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table m-0 table-hover">
                        <thead>
                            <tr class="bg-light">
                                <th>Remitente</th>
                                <th>Asunto</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th class="text-right">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentMessages as $msg)
                            <tr>
                                <td>
                                    <div class="font-weight-bold">{{ $msg->name }}</div>
                                    <small class="text-muted">{{ $msg->email }}</small>
                                </td>
                                <td>{{ Str::limit($msg->subject, 30) }}</td>
                                <td><small class="text-muted">{{ $msg->created_at->diffForHumans() }}</small></td>
                                <td>
                                    @if($msg->status === 'pending')
                                        <span class="badge badge-warning">Pendiente</span>
                                    @elseif($msg->status === 'contacted')
                                        <span class="badge badge-info">Contactado</span>
                                    @else
                                        <span class="badge badge-success">Resuelto</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-sm btn-outline-primary" title="Ver detalles">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    No hay solicitudes registradas aún.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix bg-white">
                <a href="{{ route('admin.messages.index') }}" class="btn btn-sm btn-outline-primary float-right font-weight-bold">
                    Ver Todos los Mensajes <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

        <!-- PRACTICE AREAS SUMMARY -->
        <div class="card shadow-sm">
            <div class="card-header border-0">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-balance-scale text-primary mr-1"></i> Áreas de Práctica Activas
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.practice-areas.create') }}" class="btn btn-primary btn-xs">
                        <i class="fas fa-plus"></i> Nueva Área
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-valign-middle">
                        <thead>
                            <tr>
                                <th>Área</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th class="text-right">Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($practiceAreas as $area)
                            <tr>
                                <td>
                                    <span class="material-symbols-outlined text-primary mr-2" style="vertical-align: middle;">{{ $area->icon }}</span>
                                    <strong>{{ $area->title }}</strong>
                                </td>
                                <td class="text-muted text-sm">{{ Str::limit($area->description, 50) }}</td>
                                <td>
                                    <span class="badge badge-{{ $area->is_active ? 'primary' : 'secondary' }}">
                                        {{ $area->is_active ? 'Activa' : 'Inactiva' }}
                                    </span>
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('admin.practice-areas.edit', $area->id) }}" class="text-muted">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Left col -->

    <!-- Right col -->
    <section class="col-lg-4 connectedSortable">
        <!-- QUICK ACTIONS CARD -->
        <div class="card card-outline card-primary shadow-sm">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-bolt text-primary mr-1"></i> Accesos Rápidos
                </h3>
            </div>
            <div class="card-body p-2">
                <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-primary btn-block mb-1 text-left">
                    <i class="fas fa-external-link-alt mr-2"></i> Ver Sitio Web DIMO
                </a>
                <a href="{{ route('admin.practice-areas.create') }}" class="btn btn-sm btn-outline-secondary btn-block mb-1 text-left">
                    <i class="fas fa-plus-circle mr-2"></i> Añadir Área de Práctica
                </a>
                <a href="{{ route('admin.team.create') }}" class="btn btn-sm btn-outline-secondary btn-block mb-1 text-left">
                    <i class="fas fa-user-plus mr-2"></i> Añadir Nuevo Abogado
                </a>
                <a href="{{ route('admin.settings.index') }}" class="btn btn-sm btn-outline-secondary btn-block text-left">
                    <i class="fas fa-cogs mr-2"></i> Ajustes Generales del Despacho
                </a>
            </div>
        </div>

        <!-- TEAM OVERVIEW CARD -->
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">
                    <i class="fas fa-users text-primary mr-1"></i> Equipo Jurídico
                </h3>
                <div class="card-tools">
                    <a href="{{ route('admin.team.index') }}" class="btn btn-tool btn-xs text-primary font-weight-bold">
                        Ver todos
                    </a>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="products-list product-list-in-card px-2">
                    @foreach($teamMembers as $member)
                    <li class="item py-2">
                        <div class="product-img">
                            <img src="{{ $member->image_url }}" alt="{{ $member->name }}" class="rounded-circle" style="width: 34px; height: 34px; object-fit: cover;">
                        </div>
                        <div class="product-info" style="margin-left: 44px;">
                            <a href="{{ route('admin.team.edit', $member->id) }}" class="product-title font-weight-bold text-sm">
                                {{ $member->name }}
                                <span class="badge badge-light border float-right">{{ $member->role }}</span>
                            </a>
                            <span class="product-description text-muted text-sm">
                                "{{ Str::limit($member->quote, 40) }}"
                            </span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <!-- right col -->
</div>
<!-- /.row (main row) -->
@endsection
