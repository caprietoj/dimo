@extends('admin.layouts.app')

@section('title', 'Consultas Legales')
@section('page_title', 'Solicitudes de Consulta')

@section('breadcrumb')
    <li class="breadcrumb-item active">Consultas</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Filter Tabs -->
        <div class="card card-primary card-outline shadow-sm">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link {{ empty($status) ? 'active bg-primary text-white' : 'text-dark' }}" href="{{ route('admin.messages.index') }}">
                            Todos <span class="badge {{ empty($status) ? 'badge-light' : 'badge-secondary' }} ml-1">{{ $counts['all'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $status === 'pending' ? 'active bg-dark text-white' : 'text-dark' }}" href="{{ route('admin.messages.index', ['status' => 'pending']) }}">
                            Pendientes <span class="badge {{ $status === 'pending' ? 'badge-light text-dark' : 'badge-secondary' }} ml-1">{{ $counts['pending'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $status === 'contacted' ? 'active bg-primary text-white' : 'text-dark' }}" href="{{ route('admin.messages.index', ['status' => 'contacted']) }}">
                            Contactados <span class="badge {{ $status === 'contacted' ? 'badge-light text-primary' : 'badge-secondary' }} ml-1">{{ $counts['contacted'] }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $status === 'resolved' ? 'active bg-secondary text-white' : 'text-dark' }}" href="{{ route('admin.messages.index', ['status' => 'resolved']) }}">
                            Resueltos <span class="badge {{ $status === 'resolved' ? 'badge-light text-dark' : 'badge-secondary' }} ml-1">{{ $counts['resolved'] }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.card-header -->

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped mb-0">
                        <thead>
                            <tr class="bg-light">
                                <th style="width: 50px;">ID</th>
                                <th>Remitente</th>
                                <th>Email</th>
                                <th>Asunto</th>
                                <th>Fecha Recibido</th>
                                <th>Estado</th>
                                <th class="text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $msg)
                            <tr>
                                <td>{{ $msg->id }}</td>
                                <td class="font-weight-bold text-dark">{{ $msg->name }}</td>
                                <td>
                                    <a href="mailto:{{ $msg->email }}?subject=Re: {{ urlencode($msg->subject) }}" class="text-primary font-weight-semibold">
                                        {{ $msg->email }}
                                    </a>
                                </td>
                                <td>{{ Str::limit($msg->subject, 35) }}</td>
                                <td>
                                    <span class="text-muted text-sm">{{ $msg->created_at->format('d/m/Y H:i') }}</span>
                                    <br><small class="text-muted">{{ $msg->created_at->diffForHumans() }}</small>
                                </td>
                                <td>
                                    @if($msg->status === 'pending')
                                        <span class="badge badge-warning px-2 py-1">Pendiente</span>
                                    @elseif($msg->status === 'contacted')
                                        <span class="badge badge-info px-2 py-1">Contactado</span>
                                    @else
                                        <span class="badge badge-success px-2 py-1">Resuelto</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-sm btn-outline-primary" title="Ver Consulta">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('admin.messages.destroy', $msg->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de eliminar esta consulta?');" class="d-inline">
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
                                    <i class="fas fa-inbox fa-3x mb-3 text-secondary"></i>
                                    <p class="mb-0">No se encontraron consultas en este filtro.</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            @if($messages->hasPages())
            <div class="card-footer bg-white clearfix">
                {{ $messages->links() }}
            </div>
            @endif
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection
